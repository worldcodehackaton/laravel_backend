<?php

namespace App\Http\Controllers\Auth;

use App\DTO\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function __construct(
        public UserService $service
    ) {
    }

    public function register(UserRegisterRequest $request)
    {
        $user = null;

        DB::transaction(function () use ($request, &$user) {

            $user = $this->service->store(UserDto::fromRequest($request));

        });

        $token = '';

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }
}
