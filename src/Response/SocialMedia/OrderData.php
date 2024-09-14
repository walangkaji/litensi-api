<?php

namespace walangkaji\LitensiAPI\Response\SocialMedia;

use Spatie\DataTransferObject\DataTransferObject;

class OrderData extends DataTransferObject
{
    public int $id;
    public int $price;
    public string $status;
}
