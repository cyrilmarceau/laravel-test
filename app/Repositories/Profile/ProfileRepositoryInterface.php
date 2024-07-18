<?php

namespace App\Repositories\Profile;

use App\Models\User;

interface ProfileRepositoryInterface
{
    public function getProfile(User $user): User;

    public function updateProfile(array $data): mixed;

    public function updatePassword(array $data): mixed;
}

