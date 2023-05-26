<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\BasketResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BasketCollection extends ResourceCollection
{
    public $collects = BasketResource::class;
}
