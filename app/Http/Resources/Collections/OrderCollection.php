<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\OrderResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    public $collects = OrderResource::class;
}
