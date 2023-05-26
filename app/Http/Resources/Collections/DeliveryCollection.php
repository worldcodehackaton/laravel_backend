<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\DeliveryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DeliveryCollection extends ResourceCollection
{
    public $collects = DeliveryResource::class;
}
