<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\DataTransferObject;

class SetStatusData extends DataTransferObject
{
    public int $order_id;
    public string $email;
    public string $status;
}
