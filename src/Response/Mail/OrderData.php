<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\DataTransferObject;

class OrderData extends DataTransferObject
{
    public int $order_id;
    public string $zone;
    public string $site;
    public int $price;
    public string $email;
    public string $expired_at;
    public string $status;
}
