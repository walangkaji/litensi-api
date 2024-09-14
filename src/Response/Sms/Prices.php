<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Prices extends DataTransferObject
{
    public bool $success;

    /**
     * @var string|PricesData[]
     */
    #[CastWith(DataCaster::class, itemType: PricesData::class)]
    public string|array $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": [
//         {
//             "country_id": 1,
//             "country_name": "Russia",
//             "service_id": 168,
//             "service_name": "TamTam",
//             "price": 1978
//         },
//         {
//             "country_id": 1,
//             "country_name": "Russia",
//             "service_id": 168,
//             "service_name": "TamTam",
//             "price": 1978
//         },
//         {
//             "country_id": 1,
//             "country_name": "Russia",
//             "service_id": 357,
//             "service_name": "BeeBoo",
//             "price": 1438
//         },
//     ]
// }

// Response Gagal:
// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
