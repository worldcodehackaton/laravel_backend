<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\CategoryResource;

class CategoryCollection extends ResourceCollection
{
    public $collects = CategoryResource::class;
}
