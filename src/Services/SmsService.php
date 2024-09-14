<?php

namespace walangkaji\LitensiAPI\Services;

use walangkaji\LitensiAPI\LitensiServiceManager;
use walangkaji\LitensiAPI\Response\Sms\Countries;
use walangkaji\LitensiAPI\Response\Sms\GetStatus;
use walangkaji\LitensiAPI\Response\Sms\Operators;
use walangkaji\LitensiAPI\Response\Sms\Order;
use walangkaji\LitensiAPI\Response\Sms\Prices;
use walangkaji\LitensiAPI\Response\Sms\Services;
use walangkaji\LitensiAPI\Response\Sms\SetStatus;

final class SmsService extends LitensiServiceManager
{
    /**
     * Negara
     */
    public function countries(): Countries
    {
        return $this->request('https://litensi.id/api/sms/countries')
            ->mapResponse($this->mapTo(Countries::class));
    }

    /**
     * Layanan
     */
    public function services(): Services
    {
        return $this->request('https://litensi.id/api/sms/services')
            ->mapResponse($this->mapTo(Services::class));
    }

    /**
     * Operator
     */
    public function operators(): Operators
    {
        return $this->request('https://litensi.id/api/sms/operators')
            ->mapResponse($this->mapTo(Operators::class));
    }

    /**
     * List harga
     *
     * @param ?int $country      ID Negara yang didapat dari API Negara
     *                           Contoh: 7 merupakan negara Indonesia
     * @param ?int $service      ID Layanan yang didapat dari API Layanan
     *                           Contoh: 51 merupakan layanan WhatsApp
     * @param ?int $price_filter Filter harga layanan, contoh pengisian:
     *                           - `1` = mendapatkan list 1 layanan termurah
     *                           - `2` = mendapatkan list 1 layanan termahal
     *                           - tidak diisi = mendapatkan semua list harga layanan
     *
     * @psalm-suppress InvalidParamDefault
     */
    public function prices(
        ?int $country = null,
        ?int $service = null,
        ?int $price_filter = null,
    ): Prices {
        return $this->request('https://litensi.id/api/sms/prices')
            ->addPosts([
                'country'      => $country      ?? '',
                'service'      => $service      ?? '',
                'price_filter' => $price_filter ?? '',
            ])
            ->mapResponse($this->mapTo(Prices::class));
    }

    /**
     * Buat pesanan
     *
     * @param int    $country   ID Negara yang didapat dari API Negara
     *                          Contoh: 7 merupakan negara Indonesia
     * @param int    $service   ID Layanan yang didapat dari API Layanan
     *                          Contoh: 51 merupakan layanan WhatsApp
     * @param string $operator  Operator yang tersedia sesuai negara, contoh pengisian:
     *                          Misalkan country=7 (Indonesia), operator=indosat
     * @param ?int   $max_price filter harga maksimal, penjelasan:
     *                          Dengan kondisi, WhatsApp Indonesia memiliki banyak list harga, misal: 1000, 2000 & 3000
     *                          max_price=2500,
     *                          Berarti saat melakukan order, harga toleransi maksimal layanan yang dipesan adalah 2500,
     *                          Dalam hal ini sistem akan merekomendasikan layanan dengan pertimbangan supplier,
     *                          stok yang tersedia harga kurang dari atau sama dengan 2500,
     *                          Jika dikosongkan hanya mengambil harga terendah
     *
     * @psalm-suppress InvalidParamDefault
     */
    public function order(
        int $country,
        int $service,
        string $operator,
        ?int $max_price = null,
    ): Order {
        return $this->request('https://litensi.id/api/sms/order')
            ->addPosts([
                'country'   => $country,
                'service'   => $service,
                'operator'  => $operator,
                'max_price' => $max_price ?? '',
            ])
            ->mapResponse($this->mapTo(Order::class));
    }

    /**
     * Cek status, `PENTING!` Toleransi minimal waktu request schedule getstatus adalah 5 detik
     *
     * @param int $order_id order_id yang didapat dari pesanan berhasil
     *
     * @return GetStatus - `WAITING`: Pesanan menunggu kode sms masuk
     *                   - `CANCELED`: Pesanan dibatalkan
     *                   - `SUCCESS`: Pesanan berhasil
     */
    public function getStatus(int $order_id): GetStatus
    {
        return $this->request('https://litensi.id/api/sms/getstatus')
            ->addPosts([
                'order_id' => $order_id,
            ])
            ->mapResponse($this->mapTo(GetStatus::class));
    }

    /**
     * Set Status
     *
     * @param int    $order_id order_id yang didapat dari pesanan berhasil
     * @param string $status   Hanya terdiri dari: `RESEND`, `SUCCESS`, `CANCELED`
     *
     * @return SetStatus - `RESEND`: Permintaan RESEND valid hanya pada setiap menerima SMS baru
     *                   - `CANCELED`: Permintaan CANCELED valid hanya saat waktu pemesanan sudah lewat 2 menit,
     *                   serta hanya pada saat belum menerima SMS.
     *                   - `SUCCESS`: Permintaan SUCCESS valid hanya saat SMS sudah diterima
     */
    public function setStatus(int $order_id, string $status): SetStatus
    {
        return $this->request('https://litensi.id/api/sms/setstatus')
            ->addPosts([
                'order_id' => $order_id,
                'status'   => $status,
            ])
            ->mapResponse($this->mapTo(SetStatus::class));
    }
}
