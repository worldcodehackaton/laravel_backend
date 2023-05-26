<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\DTO\UserDto;
use App\Models\User;

class UserRepository extends RepositoryContract
{
    public function __construct(
        private User $model
    )
    {

    }

    public function getQuery()
    {
        return $this->model->query();
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
}
