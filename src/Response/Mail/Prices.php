<?php

namespace walangkaji\LitensiAPI\Response\Mail;

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

// Response Berhasil (200):
// {
//     "success": true,
//     "data": [
//         {
//             "zone": "hotmail.com",
//             "price": 180,
//             "stock": 1382237
//         },
//         {
//             "zone": "outlook.com",
//             "price": 180,
//             "stock": 310105
//         },
//         ...
//     ]
// }

// Response Gagal (400):
// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
