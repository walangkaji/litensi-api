<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Operators extends DataTransferObject
{
    public bool $success;

    /**
     * @var string|OperatorsData[]
     */
    #[CastWith(DataCaster::class, itemType: OperatorsData::class)]
    public string|array $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": [
//         {
//             "country_id": 37,
//             "country_name": "Canada",
//             "operator": "any"
//         },
//         {
//             "country_id": 152,
//             "country_name": "Chile",
//             "operator": "any"
//         },
//         {
//             "country_id": 152,
//             "country_name": "Chile",
//             "operator": "claro"
//         },
//     ]
// }

// Response Gagal:
// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
