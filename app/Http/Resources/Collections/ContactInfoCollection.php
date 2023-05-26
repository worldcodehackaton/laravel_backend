<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactInfoCollection extends ResourceCollection
{
    public $collects = ContactInfoResource::class;
}
