<?php

namespace walangkaji\LitensiAPI\Services;

use walangkaji\LitensiAPI\LitensiServiceManager;
use walangkaji\LitensiAPI\Response\SocialMedia\Order;
use walangkaji\LitensiAPI\Response\SocialMedia\Services;
use walangkaji\LitensiAPI\Response\SocialMedia\Status;

final class SocialMediaService extends LitensiServiceManager
{
    /**
     * Layanan
     *
     * @param string $category Kategori spesifik, contoh pengisian: Instagram Followers
     * @param int    $filter   Filter waktu rata rata pesanan diselesaikan, contoh pengisian:
     *                         - `1` = layanan rata rata < 60 Menit
     *                         - `2` = layanan rata rata < 6 Jam
     *                         - `3` = layanan rata rata < 24 Jam
     */
    public function services(string $category = '', int $filter = 0): Services
    {
        return $this->request('https://litensi.id/api/services')
            ->addPosts([
                'category' => $category,
                'filter'   => $filter,
            ])
            ->mapResponse($this->mapTo(Services::class));
    }

    /**
     * Pemesanan
     *
     * @param int    $service         ID Layanan, lihat di Daftar Layanan: https://litensi.id/order/services
     * @param string $target          Target pesanan sesuai kebutuhan (username/url/id)
     * @param int    $quantity        Jumlah pesan
     * @param string $custom_comments custom Komentar, biasa digunakan pada layanan komentar custom,
     *                                Kosongkan jika tidak diperlukan
     * @param string $custom_link     custom Link, biasa digunakan pada layanan like komentar
     *                                Kosongkan jika tidak diperlukan
     */
    public function order(
        int $service,
        string $target,
        int $quantity,
        string $custom_comments = '',
        string $custom_link = '',
    ): Order {
        return $this->request('https://litensi.id/api/order')
            ->addPosts([
                'service'         => $service,
                'target'          => $target,
                'quantity'        => $quantity,
                'custom_comments' => $custom_comments,
                'custom_link'     => $custom_link,
            ])
            ->mapResponse($this->mapTo(Order::class));
    }

    /**
     * Status pemesanan
     *
     * @param int $id ID Pesanan yang didapat dari pesanan berhasil
     *
     * @return Status - `Pending`: Pesanan dalam antrian
     *                - `Processing`: Pesanan sedang diproses
     *                - `Success`: Pesanan selesai dan berhasil
     *                - `Error`: Pesanan gagal diproses
     *                - `Partial`: Pesanan selesai diproses tetapi tidak sesuai jumlah pesan
     */
    public function status(int $id): Status
    {
        return $this->request('https://litensi.id/api/status')
            ->addPosts([
                'id' => $id,
            ])
            ->mapResponse($this->mapTo(Status::class));
    }
}
