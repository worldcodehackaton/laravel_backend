<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        public OrderRepository $repository
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
}
