<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Basket;
use Illuminate\Database\Eloquent\Collection;

class BasketRepository extends RepositoryContract
{
    public function __construct(
        private Basket $model
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

    public function findOrFail(int $id): Basket
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

    public function delete(): static
    {
        $this->model->delete();

        return $this;
    }
}
