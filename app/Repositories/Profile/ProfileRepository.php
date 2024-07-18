<?php

namespace App\Repositories\Profile;

use \Auth;
use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface
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

    public function updatePassword(array $data): mixed
    {
        $user = Auth::user();

        if (!\Hash::check($data['old_password'], $user->password)) {
            return ['old_password' => ['Your old password is incorrect']];
        }

        $user->update([
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }
}
