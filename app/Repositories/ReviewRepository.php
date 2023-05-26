<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;

class ReviewRepositores extends RepositoryContract
{
    public function __construct(
        private Review $model,
    ) {
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function all(): Collection
    {
        return $this->getQuery()->all();
    }
}
