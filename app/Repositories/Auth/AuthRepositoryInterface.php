<?php

namespace App\Repositories\Auth;

interface AuthRepositoryInterface {
    public function login(array $credentials): array;
    public function signup(array $data): mixed;
}

