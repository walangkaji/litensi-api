<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class GetStatusData extends DataTransferObject
{
    public int $order_id;
    public string $phone;
    public string $sms;
    public string $status;
}
