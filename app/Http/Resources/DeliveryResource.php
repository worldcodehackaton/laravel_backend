<?php

namespace App\Http\Resources;

use App\Http\Resources\Collections\OrderCollection;
use App\Repositories\OrderRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var OrderRepository $orderRepository */
        $orderRepository = app(OrderRepository::class);
        /** @var StoreRepository $storeRepository */
        $storeRepository = app(StoreRepository::class);

        return [
            'orders' => new OrderCollection($orderRepository->getByIds($this->orders)),
            'store' => new StoreResource($storeRepository->findOrFail($this->store_id)),
            'status' => $this->status,
            'delivered_at' => $this->delivered_at,
        ];
    }
}
