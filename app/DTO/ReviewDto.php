<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ReviewDto extends DataTransferObject
{
    public string $text;
    public int $rate;
    public int $client_id;
    public int $store_id;

    public static function fromRequest($request): static
    {
        return new self($request->all());
    }
}
