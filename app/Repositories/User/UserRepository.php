<?php

namespace App\Repositories\User;

use \Auth;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getProfile(User $user): User
    {
        return $user;
    }

    public function updateProfile(array $data): mixed
    {
        $user = Auth::user();
        $user->update($data);

        return $user;
    }
}
