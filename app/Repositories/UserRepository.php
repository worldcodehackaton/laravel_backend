<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends RepositoryContract
{
    public function __construct(
        private User $model
    ) {
    }

    public function getModel(): User
    {
        return $this->model;
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function farmers(): Collection
    {
        return $this->model->farmers()->get();
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

    public function findOrFail(int $id): User
    {
        return $this->model->findOrFail($id);
    }
}
