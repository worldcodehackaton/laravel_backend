<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends RepositoryContract
{
    public function __construct(
        private Product $model
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

    public function findOrFail(int $id): Product
    {
        return $this->model->findOrFail($id);
    }
}
