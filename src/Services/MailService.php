<?php

namespace walangkaji\LitensiAPI\Services;

use walangkaji\LitensiAPI\LitensiServiceManager;
use walangkaji\LitensiAPI\Response\Mail\GetStatus;
use walangkaji\LitensiAPI\Response\Mail\Order;
use walangkaji\LitensiAPI\Response\Mail\Prices;
use walangkaji\LitensiAPI\Response\Mail\ReOrder;
use walangkaji\LitensiAPI\Response\Mail\SetStatus;

final class MailService extends LitensiServiceManager
{
    /**
     * List harga
     *
     * @param string $site Domain pengirim email (Email Sender), contoh: facebook.com
     */
    public function prices(string $site): Prices
    {
        return $this->request('https://litensi.id/api/mail/prices')
            ->addPosts([
                'site' => $site,
            ])
            ->mapResponse($this->mapTo(Prices::class));
    }

    /**
     * Buat pesanan
     *
     * @param string $zone zone yang didapatkan dari endpoint prices, contoh: gmail.com
     * @param string $site Domain pengirim email (Email Sender), contoh: tiktok.com
     */
    public function order(string $zone, string $site): Order
    {
        return $this->request('https://litensi.id/api/mail/order')
            ->addPosts([
                'zone' => $zone,
                'site' => $site,
            ])
            ->mapResponse($this->mapTo(Order::class));
    }

    /**
     * Cek status, PENTING! Toleransi minimal waktu request schedule getstatus adalah 5 detik
     *
     * @param int $order_id order_id yang didapat dari pesanan berhasil
     */
    public function getStatus(int $order_id): GetStatus
    {
        return $this->request('https://litensi.id/api/mail/getstatus')
            ->addPosts([
                'order_id' => $order_id,
            ])
            ->mapResponse($this->mapTo(GetStatus::class));
    }

    /**
     * Set status
     *
     * @param int    $order_id order_id yang didapat dari pesanan berhasil
     * @param string $status   Hanya terdiri dari: `RESEND`, `SUCCESS`, `CANCELED`
     *
     * @return SetStatus - `RESEND`: Permintaan RESEND valid hanya pada setiap menerima Pesan baru
     *                   - `CANCELED`: Permintaan CANCELED valid hanya pada saat belum menerima Pesan
     *                   - `SUCCESS`: Permintaan SUCCESS valid hanya saat Pesan sudah diterima
     */
    public function setStatus(int $order_id, string $status): SetStatus
    {
        return $this->request('https://litensi.id/api/mail/setstatus')
            ->addPosts([
                'order_id' => $order_id,
                'status'   => $status,
            ])
            ->mapResponse($this->mapTo(SetStatus::class));
    }

    /**
     * Re-Order
     *
     * @param string $site  Domain pengirim email (Email Sender) yang pernah dipesan sebelumnya, contoh: tiktok.com
     * @param string $email Email yang pernah dipesan sebelumnya, contoh: befasyza2017@gmail.com
     */
    public function reOrder(string $site, string $email): ReOrder
    {
        return $this->request('https://litensi.id/api/mail/reorder')
            ->addPosts([
                'site'  => $site,
                'email' => $email,
            ])
            ->mapResponse($this->mapTo(ReOrder::class));
    }
}
