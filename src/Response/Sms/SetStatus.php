<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use walangkaji\LitensiAPI\Response\DataCaster;

class SetStatus extends DataTransferObject
{
    public bool $success;

    #[CastWith(DataCaster::class, itemType: SetStatusData::class)]
    public string|SetStatusData $data;
}

// Response Berhasil:
// {
//     "success": true,
//     "data": {
//         "order_id": 5751,
//         "phone": "628385582230",
//         "status": "RESEND"
//     }
// }

// Response Gagal:
// {"success":false,"data":"API salah atau tidak aktif"}
// {"success":false,"data":"REQUEST INVALID"} //Permintaan tidak valid
// {"success":false,"data":"CANCEL FAILED"} //Permintaan CANCELED gagal
// {"success":false,"data":"CANCEL AFTER 2 MINUTES"} //CANCELED harus setelah 2 menit setelah pemesanan
// {"success":false,"data":"SUCCESS FAILED"} //Permintaan SUCCESS gagal
// {"success":false,"data":"SMS ACTIVATION EXPIRED"} //Pesanan berakhir
// {"success":false,"data":"ACTIVATION DOES NOT EXIST"} //Tidak ada data pesanan
