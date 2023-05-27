<?php

namespace App\Http\Controllers;

use App\DTO\OrderDto;
use App\Http\Resources\Collections\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function __construct(
        public OrderRepository $repository,
        public OrderService $service
    ) {
    }

    public function index(Request $request): OrderCollection
    {
        return new OrderCollection($this->repository->all());
    }

    public function show(Request $request, Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    public function store(Request $request)
    {
        $this->service->storeBatch($request->input('orders'));

        return response('', Response::HTTP_OK);
    }

    public function sendAn(Request $request, Order $order)
    {
        $this->service->sendAn(new OrderDto($order->toArray()));

        return response('', Response::HTTP_OK);
    }

    public function finish(Request $request)
    {
        $this->service->finishBatch($request->input('orders'));

        return response('', Response::HTTP_NO_CONTENT);
    }
}
