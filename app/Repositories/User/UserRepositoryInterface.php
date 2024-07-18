<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getProfile(User $user): User;

    public function updateProfile(array $data): mixed;

    public function updatePassword(array $data): mixed;
}

