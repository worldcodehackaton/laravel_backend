<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\StoreResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoreCollection extends ResourceCollection
{
    public $collects = StoreResource::class;
}
