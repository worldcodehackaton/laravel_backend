<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\ReviewResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
{
    public $collects = ReviewResource::class;
}
