<?php

namespace App\Http\Resources;

use App\Http\Resources\Collections\BasketCollection;
use App\Repositories\BasketRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var ProductRepository $productRepository */
        $productRepository = app(ProductRepository::class);
        /** @var StoreRepository $storeRepository */
        $storeRepository = app(StoreRepository::class);

        $store = new StoreResource($storeRepository->findOrFail($this->store_id));
        $product = new ProductResource($productRepository->findOrFail($this->product_id));

        return [
            'product' => $product,
            'store' => $store,
            'status' => $this->status,
            'delivered_at' => $this->delivered_at,
        ];
    }
}
