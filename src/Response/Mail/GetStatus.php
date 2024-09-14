<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class GetStatus extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: GetStatusData::class)]
    public string|GetStatusData $data;
}

// Response Berhasil (200):
// {
//     "success": true,
//     "data": {
//         "order_id": 5,
//         "email": "befasyza2017@gmail.com",
//         "message": "",
//         "full_message": "",
//         "status": "WAITING"
//     }
// }

// Response Gagal (400):
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"ACTIVATION DOES NOT EXIST"}
