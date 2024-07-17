<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function getProfile(User $user): User {
        return $user;
    }
}
