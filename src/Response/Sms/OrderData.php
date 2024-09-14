<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class OrderData extends DataTransferObject
{
    public int $order_id;
    public int $country_id;
    public string $country_name;
    public int $service_id;
    public string $service_name;
    public string $operator;
    public string $phone;
    public string $expired_at;
    public string $status;
}
