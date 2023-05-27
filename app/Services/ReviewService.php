<?php

namespace App\Services;

use App\DTO\ReviewDto;
use App\Models\Review;
use App\Repositories\ReviewRepository;

class ReviewService
{
    private ReviewRepository $repository;

    public function __construct(
        private Review $review
    ) {
        $this->repository = app(ReviewRepository::class);
    }

    public function store(ReviewDto $dto): static
    {
        $this->repository
            ->fill($dto->toArray())
            ->save();

        return $this;
    }
}
