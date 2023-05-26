<?php

namespace App\Http\Resources\Collections;

use App\Repositories\StoreRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoreCollection extends ResourceCollection
{
    public $collects = StoreRepository::class;
}
