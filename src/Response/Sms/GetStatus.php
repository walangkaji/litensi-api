<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class GetStatus extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: GetStatusData::class)]
    public string|GetStatusData $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": {
//         "order_id": 5751,
//         "phone": "628385582230",
//         "sms": "",
//         "status": "WAITING"
//     }
// } //Menunggu Kode SMS

// {
//     "success": true,
//     "data": {
//         "order_id": 5751,
//         "phone": "628385582230",
//         "sms": "412439",
//         "status": "RECEIVED"
//     }
// } //Kode SMS berhasil didapatkan

// Response Gagal:
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"ACTIVATION DOES NOT EXIST"}
