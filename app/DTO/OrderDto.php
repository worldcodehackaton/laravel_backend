<?php

namespace App\DTO;

use App\Caster\DatetimeCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class OrderDto extends DataTransferObject
{
    public int $store_id;
    public int $client_id;
    public int $product_id;
    public ?int $count;
    public ?float $weight;
    public string $status;
    #[CastWith(DatetimeCaster::class)]
    public string $delivered_at;
}
