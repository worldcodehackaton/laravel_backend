<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;

class StoreRepository extends RepositoryContract
{
    public function __construct(
        private Store $model
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

    public function findOrFail(int $id): Store
    {
        return $this->model->findOrFail($id);
    }

    public function getAvgRate(): float
    {
        $rate = $this->model->reviews()->avg('rate');

        return round($rate, 1);
    }
}
