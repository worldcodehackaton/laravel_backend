<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\ProductImageResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductImageCollection extends ResourceCollection
{
    public $collects = ProductImageResource::class;
}
