<?php

namespace App\Services;

use App\DTO\OrderDto;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderService
{
    private OrderRepository $repository;

    public function __construct(
        private Order $order,
    ) {
        $this->repository = app(OrderRepository::class, ['model' => $order]);
    }

    public function storeBatch(array $orders): static
    {
        foreach ($orders as $order) {
            $this->store(new OrderDto(
                $order + ['status' => Order::STATUS_PAYMENT_REQUIRED]
            ));
        }

        return $this;
    }

    public function store(OrderDto $dto): static
    {
        $this->repository = app(OrderRepository::class);

        $this->repository
            ->fill($dto->toArray())
            ->save();

        return $this;
    }

    public function sendAn(OrderDto $dto): static
    {
        $this->repository->changeStatus(Order::STATUS_PAID);

        return $this;
    }

    public function finishBatch(array $orderIds): static
    {
        foreach ($orderIds as $id) {
            $this->repository = app(OrderRepository::class, [
                'model' => $this->repository->findOrFail($id),
            ]);

            $this->finish();
        }

        return $this;
    }

    public function finish(): static
    {
        $this->repository
            ->changeStatus(Order::STATUS_DELIVERED)
            ->delete();

        return $this;
    }
}
