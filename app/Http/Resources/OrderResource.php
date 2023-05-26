<?php

namespace App\Http\Resources;

use App\Http\Resources\Collections\BasketCollection;
use App\Repositories\BasketRepository;
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
        /** @var BasketRepository $basketRepository */
        $basketRepository = app(BasketRepository::class);
        /** @var StoreRepository $storeRepository */
        $storeRepository = app(StoreRepository::class);

        return [
            'baskets' => new BasketCollection($basketRepository->getByIds($this->baskets)),
            'store' => new StoreResource($storeRepository->findOrFail($this->store_id)),
            'status' => $this->status,
            'delivered_at' => $this->delivered_at,
        ];
    }
}
