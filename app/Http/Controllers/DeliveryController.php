<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\DeliveryCollection;
use App\Http\Resources\DeliveryResource;
use App\Models\Delivery;
use App\Repositories\DeliveryRepository;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct(
        public DeliveryRepository $repository
    ) {
    }

    public function index(Request $request): DeliveryCollection
    {
        return new DeliveryCollection($this->repository->all());
    }

    public function show(Request $request, Delivery $delivery): DeliveryResource
    {
        return new DeliveryResource($delivery);
    }
}
