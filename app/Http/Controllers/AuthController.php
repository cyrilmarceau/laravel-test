<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Repositories\Auth\AuthRepositoryInterface;


class AuthController extends Controller {
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository = null) {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request){
        $result = $this->authRepository->login($request->validated());
        return response()->json($result);
    }

    public function signup(SignupRequest $request){
        $result = $this->authRepository->signup($request->validated());
        return response()->json($result);
    }
}
