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

    public function getByIds(array $ids): Collection
    {
        return $this->model->whereIn('id', $ids)->get();
    }
}
