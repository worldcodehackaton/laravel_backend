<?php

namespace App\Services;

use App\DTO\HelpTipDto;
use App\DTO\ReviewDto;
use App\Models\HelpTip;
use App\Repositories\HelpTipRepository;

class HelpTipService
{
    private HelpTipRepository $repository;

    public function __construct(
        private HelpTip $review
    ) {
        $this->repository = app(HelpTipRepository::class);
    }

    public function store(HelpTipDto $dto): static
    {
        $this->repository
            ->fill($dto->toArray())
            ->save();

        return $this;
    }
}
