<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class SetStatusData extends DataTransferObject
{
    public int $order_id;
    public string $phone;
    public string $status;
}
