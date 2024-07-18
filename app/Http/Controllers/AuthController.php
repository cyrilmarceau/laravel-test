<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use App\Repositories\Auth\AuthRepositoryInterface;


class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository = null)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authRepository->login($request->validated());
        if (isset($result['error'])) {
            return ApiResponse::error($result['error'], null, 401);
        }

        return ApiResponse::success([
            'user' => new UserResource($result['user']),
            'token' => $result['token']
        ], 'Login successful');
    }

    public function signup(SignupRequest $request)
    {
        $user = $this->authRepository->signup($request->validated());

        return ApiResponse::success(new UserResource($user), 'Signup successful');
    }

    public function logout()
    {
        $this->authRepository->logout();

        return ApiResponse::success(null, 'Logout successful');
    }
}
