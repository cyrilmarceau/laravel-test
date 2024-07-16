<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Responses\ApiResponse;
use App\Repositories\Auth\AuthRepositoryInterface;


class AuthController extends Controller {
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository = null) {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request){
        $result = $this->authRepository->login($request->validated());
        if(isset($result['error'])){
            return ApiResponse::error($result['error'], null, 401);
        }
        
        return ApiResponse::success($result, 'Login successful');
    }

    public function signup(SignupRequest $request){
        $result = $this->authRepository->signup($request->validated());

        return ApiResponse::success($result, 'Signup successful');
        
    }
}
