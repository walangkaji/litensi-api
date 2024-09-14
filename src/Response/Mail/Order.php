<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Order extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: OrderData::class)]
    public string|OrderData $data;
}

// Response Berhasil (200):
// {
//     "success": true,
//     "data": {
//         "order_id": 5,
//         "zone": "gmail.com",
//         "site": "tiktok.com",
//         "price": 480,
//         "email": "befasyza2017@gmail.com",
//         "expired_at": "2024-02-24 01:05:49",
//         "status": "WAITING"
//     }
// }

// Response Gagal (400):
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"BAD SITE"} //Anda salah menentukan situs
// {"success":false,"data":"BAD ZONE"} //Zone salah atau tidak tersedia
// {"success":false,"data":"OUT OF STOCK"} //Stok tidak tersedia
// {"success":false,"data":"QUEUE LIMIT"} //Limit antrian pesanan aktif (max 100 antrian)
// {"success":false,"data":"NO BALANCE"} //Saldo anda tidak mencukupi
// {"success":false,"data":"SERVER MAINTENANCE"} //Server maintenance
// {"success":false,"data":"ERORR OCCURS"} //Terjadi kesalahan, coba lagi
// {"success":false,"data":"SYSTEM ERROR"} //Unknown, system error. kontak admin
// {"success":false,"data":"TIME LIMIT EXCEED"} //Batasan pesanan
// {"success":false,"data":"XXXXX"} //Error lainnya
