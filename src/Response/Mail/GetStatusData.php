<?php

namespace walangkaji\LitensiAPI\Response\Mail;

use Spatie\DataTransferObject\DataTransferObject;

class GetStatusData extends DataTransferObject
{
    public int $order_id;
    public string $email;
    public string $message;
    public string $full_message;
    public string $status;
}
