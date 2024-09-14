<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class SetStatus extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: SetStatusData::class)]
    public string|SetStatusData $data;
}

// Response Berhasil (200):
// {
//     "success": true,
//     "data": {
//         "order_id": 5,
//         "email": "befasyza2017@gmail.com",
//         "status": "CANCELED"
//     }
// }

// Response Gagal (400):
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"REQUEST INVALID"} //Permintaan tidak valid
// {"success":false,"data":"CANCEL FAILED"} //Permintaan CANCELED gagal
// {"success":false,"data":"SUCCESS FAILED"} //Permintaan SUCCESS gagal
// {"success":false,"data":"EMAIL ACTIVATION EXPIRED"} //Pesanan berakhir
// {"success":false,"data":"ACTIVATION DOES NOT EXIST"} //Tidak ada data pesanan
