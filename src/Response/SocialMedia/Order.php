<?php

namespace walangkaji\LitensiAPI\Response\SocialMedia;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Order extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: OrderData::class)]
    public string|OrderData $data;
}

// {
//     "success": true,
//     "data": {
//         "id": 16445,
//         "price": 226,
//         "status": "Pending"
//     }
// }

// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
