<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\CategoryCollection;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        public CategoryRepository $repository
    ) {
    }

    public function index(Request $request): CategoryCollection
    {
        return new CategoryCollection($this->repository->all());
    }
}
