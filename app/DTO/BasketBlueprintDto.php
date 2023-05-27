<?php

namespace App\DTO;

use App\Caster\DatetimeCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class BasketBlueprintDto extends DataTransferObject
{
    public ?int $id;
    public string $client_id;
    public string $product_id;
    public string $store_id;
    public string $count;
    public string $weight;
    #[CastWith(DatetimeCaster::class)]
    public string $order_at;

    public static function fromRequest($request): static
    {
        return new self($request->all());
    }
}
