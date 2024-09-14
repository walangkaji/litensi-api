<?php

namespace walangkaji\LitensiAPI\Response;

use Spatie\DataTransferObject\DataTransferObject;

class ProfileData extends DataTransferObject
{
    public string $username;
    public string $full_name;
    public string $balance;
}
