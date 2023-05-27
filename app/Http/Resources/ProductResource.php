<?php

namespace App\Http\Resources;

use App\Http\Resources\Collections\ProductImageCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = new ProductImageCollection($this->images);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'store_id' => $this->store_id,
            'category_id' => $this->category_id,
            'calc_type' => $this->calc_type,
            'created_at' => $this->created_at,
            'images' => $images,
        ];
    }
}
