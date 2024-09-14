<?php

namespace walangkaji\LitensiAPI\Response\SocialMedia;

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

// {
//     "success": true,
//     "data": [
//         {
//             "id": 4672,
//             "category": "Instagram Followers (No Refill)",
//             "name": "Instagram Followers Mp 31 ( Less Drop | Drop 10-20% ) ",
//             "price": 29726,
//             "min": 100,
//             "max": 5000,
//             "description": "1k in 1 minutes\n80% real\nKemungkinan drop 10-20% jika anda memesan 1000+\n",
//             "type": "primary",
//             "refill": 0,
//             "refill_period": 0,
//             "average": "jumlah pesan rata rata 600 waktu proses 15 jam 35 menit."
//         },
//         {
//             "id": 4685,
//             "category": "Instagram Followers (No Refill)",
//             "name": "Instagram Followers Server 7 ( Fastest - Bot ) ",
//             "price": 5772,
//             "min": 10,
//             "max": 30000,
//             "description": "Bot Quality",
//             "type": "primary",
//             "refill": 0,
//             "refill_period": 0,
//             "average": "jumlah pesan rata rata 356 waktu proses 1 jam 6 menit."
//         },
//     ]
// }

// {
//     "success": false,
//     "data": "API salah atau tidak aktif"
// }
