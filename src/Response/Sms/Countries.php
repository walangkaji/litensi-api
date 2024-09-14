<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class Countries extends DataTransferObject
{
    public bool $success;

    /**
     * @var string|CountriesData[]
     */
    #[CastWith(DataCaster::class, itemType: CountriesData::class)]
    public string|array $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": [
//         {
//             "id": 37,
//             "name": "Canada",
//             "operator": "any,cellular,chatrmobile,fido,lucky,rogers,telus"
//         },
//         {
//             "id": 152,
//             "name": "Chile",
//             "operator": "any,claro,entel,movistar,wom"
//         },
//     ]
// }

// Response Gagal:
// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
