<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface {
    public function getProfile(User $user): User;
}

