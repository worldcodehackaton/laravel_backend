<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository extends RepositoryContract
{
    public function __construct(
        private Order $model
    ) {
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findOrFail(int $id): Order
    {
        return $this->model->findOrFail($id);
    }

    public function fill(array $data): static
    {
        $this->model->fill($data);

        return $this;
    }

    public function save(): static
    {
        $this->model->save();

        return $this;
    }

    public function changeStatus(string $status): static
    {
        $this->fill(compact('status'))->save();

        return $this;
    }

    public function delete(): static
    {
        $this->model->delete();

        return $this;
    }
}
