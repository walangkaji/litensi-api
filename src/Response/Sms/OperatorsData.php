<?php

namespace walangkaji\LitensiAPI\Response\Sms;

use Spatie\DataTransferObject\DataTransferObject;

class OperatorsData extends DataTransferObject
{
    public int $country_id;
    public string $country_name;
    public string $operator;
}
