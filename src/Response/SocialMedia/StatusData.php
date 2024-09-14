<?php

namespace walangkaji\LitensiAPI\Response\SocialMedia;

use Spatie\DataTransferObject\DataTransferObject;

class StatusData extends DataTransferObject
{
    public int $id;
    public string $status;
    public float $total_charge;
    public int $start_count;
    public int $remains;
}
