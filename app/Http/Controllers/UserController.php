<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\UserCollection;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        public UserRepository $repository
    ) {
    }

    public function index(Request $request): UserCollection
    {
        return new UserCollection($this->repository->farmers());
    }
}
