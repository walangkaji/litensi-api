<?php

namespace walangkaji\LitensiAPI\Response\SocialMedia;

use Spatie\DataTransferObject\DataTransferObject;

class ServicesData extends DataTransferObject
{
    public int $id;
    public string $category;
    public string $name;
    public int $price;
    public int $min;
    public int $max;
    public string $description;
    public string $type;
    public int $refill;
    public int $refill_period;
    public string $average;
}
