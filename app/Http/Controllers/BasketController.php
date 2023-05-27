<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Http\Resources\Collections\BasketCollection;
use App\Models\Basket;
use App\Repositories\BasketRepository;
use App\Services\BasketService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasketController extends Controller
{
    public function __construct(
        public BasketRepository $repository,
        public BasketService $service,
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

    public function store(Request $request)
    {
        $this->service->storeBatch($request->input('basket'));

        return response('', Response::HTTP_OK);
    }

    public function delete(Request $request, Basket $basket)
    {
        $this->repository = app(BasketRepository::class, ['model' => $basket]);

        $this->repository->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
