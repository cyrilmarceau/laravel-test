<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use App\Repositories\Auth\AuthRepositoryInterface;
use stdClass;

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

        if (isset($result['general_error'])) {
            $messages = [
                'non_field_error' => $result['general_error'],
                'notification_content' => 'Authentication failed',
            ];

            return ApiResponse::error(messages: $messages, httpCode: 401);
        }

        $messages = [
            'non_field_success' => 'Login successful',
            'notification_content' => 'Welcome back!',
        ];

        unset($result['user']);

        return ApiResponse::ok(data: $result, messages: $messages);
    }

    public function signup(SignupRequest $request)
    {
        $user = $this->authRepository->signup($request->validated());

        $messages = [
            'non_field_success' => 'Signup successful',
            'notification_content' => 'Welcome to the community!',
        ];

        return ApiResponse::ok(data: new UserResource($user), messages: $messages);
    }

    public function logout()
    {
        $this->authRepository->logout();

        $messages = [
            'non_field_success' => 'Login successful',
            'notification_content' => 'Welcome back!',
        ];

        return ApiResponse::ok(data: null, messages: $messages);
    }
}
