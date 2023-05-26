<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Http\Resources\Collections\BasketCollection;
use App\Models\Basket;
use App\Repositories\BasketRepository;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(
        public BasketRepository $repository
    ) {
    }

    public function index(Request $request): BasketCollection
    {
        return new BasketCollection($this->repository->all());
    }

    public function show(Request $request, Basket $basket): BasketResource
    {
        return new BasketResource($basket);
    }
}
