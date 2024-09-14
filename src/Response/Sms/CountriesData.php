<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class CountriesData extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $operator;
}
