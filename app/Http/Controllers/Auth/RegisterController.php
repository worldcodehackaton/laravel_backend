<?php

namespace App\Http\Controllers\Auth;

use App\DTO\ClientDto;
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
        $token = null;

        DB::transaction(function () use ($request, &$user, &$token) {

            $user = $this->service->store(ClientDto::fromRequest($request));
            $token = $user->createToken('login_token')->plainTextToken;

        });

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }
}
