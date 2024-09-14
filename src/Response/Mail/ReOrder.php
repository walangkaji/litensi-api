<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class ReOrder extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: ReOrderData::class)]
    public string|ReOrderData $data;
}

// Response Berhasil (200):
// {
//     "success": true,
//     "data": {
//         "order_id": 5,
//         "email": "befasyza2017@gmail.com",
//         "expired_at": "2024-02-24 01:54:30"
//     }
// }

// Response Gagal (400):
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"BAD EMAIL"} //Mail was banned
// {"success":false,"data":"FAILED"}
// {"success":false,"data":"ERROR"}
// {"success":false,"data":"ACTIVATION IS ACTIVE"}
// {"success":false,"data":"ACTIVATION DOES NOT EXIST"} //Activation not found (It`s not your activation)
// {"success":false,"data":"XXXXX"} //Error lainnya
