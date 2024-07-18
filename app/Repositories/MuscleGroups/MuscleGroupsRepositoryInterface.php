<?php

namespace App\Repositories\MuscleGroups;

use Illuminate\Database\Eloquent\Collection;

interface MuscleGroupsRepositoryInterface
{
    public function index(): Collection;
}

