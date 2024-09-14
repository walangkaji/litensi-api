<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class ServicesData extends DataTransferObject
{
    public int $id;
    public string $name;
}
