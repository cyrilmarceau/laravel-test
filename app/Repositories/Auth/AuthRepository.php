<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthRepository implements AuthRepositoryInterface {
    public function login(array $credentials): array {
        if (!Auth::attempt($credentials)) {
            return ['error' => 'Invalid credentials'];
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return ['token' => $token, 'user' => $user];
    }

    public function signup(array $data): mixed {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    public function logout(): mixed {
        return Auth::user()->tokens()->delete();
    }
}