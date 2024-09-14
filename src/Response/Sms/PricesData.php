<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class PricesData extends DataTransferObject
{
    public int $country_id;
    public string $country_name;
    public int $service_id;
    public string $service_name;
    public int $price;
}
