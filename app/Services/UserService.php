<?php

namespace App\Services;

use App\DTO\ClientDto;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $repository;

    public function __construct(
        private User $user,
    ) {
        $this->repository = app(UserRepository::class, ['model' => $user]);
    }

    public function store(ClientDto $dto): User
    {
        $this->repository
            ->fill($dto->toArray())
            ->save();

        return $this->repository->getModel();
    }
}
