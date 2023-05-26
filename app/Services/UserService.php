<?php

namespace App\Services;

use App\DTO\UserDto;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    public function store(UserDto $dto): static
    {
        $this->repository
            ->fill($dto->toArray())
            ->save();

        return $this;
    }
}
