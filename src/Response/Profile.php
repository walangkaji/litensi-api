<?php

namespace walangkaji\LitensiAPI\Response;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class Profile extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: ProfileData::class)]
    public string|ProfileData $data;
}

// {
// 	"success": true,
// 	"data": {
// 		"username": "sambrerolab",
// 		"full_name": "David Bassi",
// 		"balance": "0.00"
// 	}
// }

// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
