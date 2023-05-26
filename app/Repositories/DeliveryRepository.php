<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Collection;

class DeliveryRepository extends RepositoryContract
{
    public function __construct(
        private Delivery $model
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
}
