<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Category;

class CategoryRepository extends RepositoryContract
{
    public function __construct(
        private Category $model
    ) {
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->model->all();
    }
}
