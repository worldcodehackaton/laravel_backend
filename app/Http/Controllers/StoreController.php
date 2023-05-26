<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\StoreCollection;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Repositories\StoreRepository;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(
        public StoreRepository $repository
    ) {
    }

    public function index(Request $request): StoreCollection
    {
        return new StoreCollection($this->repository->all());
    }

    public function show(Request $request, Store $store): StoreResource
    {
        return new StoreResource($store);
    }

    public function ratingView(Request $request): StoreCollection
    {
        $stores = $this->repository->all()
            ->sortBy('rate');

        return new StoreCollection($stores);
    }
}
