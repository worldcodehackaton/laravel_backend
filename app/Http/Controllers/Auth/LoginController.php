<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            /** @var \App\Models\User $user */
            $user = auth()->user();

            $user->tokens()->delete();

            $token = $user->createToken('login_token')->plainTextToken;

            $user = new UserResource($user);

            return response(compact('user', 'token'));
        }

        return response('', 403);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    }
}
