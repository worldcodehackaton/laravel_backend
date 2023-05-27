<?php

namespace App\DTO;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class BasketDto extends DataTransferObject
{
    public int $store_id;
    public int $client_id;
    public int $product_id;
    public ?int $count;
    public ?float $weight;
    public string $type;

    public static function fromRequest(Request $request)
    {
        return new self($request->all());
    }
}
