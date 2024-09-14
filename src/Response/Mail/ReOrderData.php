<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\DataTransferObject;

class ReOrderData extends DataTransferObject
{
    public int $order_id;
    public string $email;
    public string $expired_at;
}
