<?php

namespace walangkaji\LitensiAPI\Response\SocialMedia;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Status extends DataTransferObject
{
    public bool $success;

    /**
     * @var string|StatusData[]
     */
    #[CastWith(DataCaster::class, itemType: StatusData::class)]
    public string|array $data;
}

// {
//     "success": true,
//     "data": [
//         {
//             "id": 25647,
//             "status": "Success",
//             "total_charge": 925.18,
//             "start_count": 10181,
//             "remains": 0
//         }
//     ]
// }
