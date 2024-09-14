<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Order extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: OrderData::class)]
    public string|OrderData $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": {
//         "order_id": 5751,
//         "country_id": 7,
//         "country_name": "Indonesia",
//         "service_id": 159,
//         "service_name": "JTExpress",
//         "operator": "any",
//         "phone": "628385582230",
//         "expired_at": "2023-11-10 01:16:36",
//         "status": "WAITING"
//     }
// }

// Response Gagal:
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"NO SERVICE"} //Layanan tidak tersedia
// {"success":false,"data":"QUEUE LIMIT"} //Limit antrian pesanan aktif (max 100 antrian)
// {"success":false,"data":"NO BALANCE"} //Saldo anda tidak mencukupi
// {"success":false,"data":"SERVER MAINTENANCE"} //Server maintenance
// {"success":false,"data":"NO NUMBERS"} //Tidak ada stok nomor
// {"success":false,"data":"SERVER OFF"} //Server off
// {"success":false,"data":"XXXXX"} //Error lainnya
