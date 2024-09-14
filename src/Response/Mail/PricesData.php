<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\DataTransferObject;

class PricesData extends DataTransferObject
{
    public string $zone;
    public int $price;
    public int $stock;
}
