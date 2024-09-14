<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Services extends DataTransferObject
{
    public bool $success;

    /**
     * @var string|ServicesData[]
     */
    #[CastWith(DataCaster::class, itemType: ServicesData::class)]
    public string|array $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": [
//         {
//             "id": 300,
//             "name": "Any other"
//         },
//         {
//             "id": 9,
//             "name": "AOL"
//         },
//     ]
// }

// Response Gagal:
// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
