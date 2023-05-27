<?php

namespace App\Services;

use App\DTO\BasketBlueprintDto;
use App\Jobs\BasketBlueprintToOrderJob;
use App\Models\BasketBlueprint;
use App\Repositories\BasketBlueprintRepository;

class BasketBlueprintService
{
    private BasketBlueprintRepository $repository;

    public function __construct(
        private BasketBlueprint $model
    ) {
    }

    public function store(BasketBlueprintDto $dto): static
    {
        $this->repository
            ->fill($dto->toArray())
            ->save();

        $this->dispatchToOrderJob($dto);

        return $this;
    }

    private function dispatchToOrderJob(BasketBlueprintDto $dto): void
    {
        BasketBlueprintToOrderJob::dispatch($dto);
    }
}
