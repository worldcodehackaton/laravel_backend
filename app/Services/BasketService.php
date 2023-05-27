<?php

namespace App\Services;

use App\DTO\BasketDto;
use App\Models\Basket;
use App\Repositories\BasketRepository;
use Illuminate\Support\Facades\DB;

class BasketService
{
    private BasketRepository $repository;

    public function __construct(
        private Basket $basket,
    ) {
        $this->repository = app(BasketRepository::class, ['model' => $basket]);
    }

    public function storeBatch(array $basketItems): static
    {
        foreach ($basketItems as $item) {
            $this->store(new BasketDto($item));
        }

        return $this;
    }

    public function store(BasketDto $dto): static
    {
        $this->repository = app(BasketRepository::class);

        DB::transaction(function () use ($dto) {
            $this->repository
                ->fill($dto->toArray())
                ->save();
        });

        return $this;
    }
}
