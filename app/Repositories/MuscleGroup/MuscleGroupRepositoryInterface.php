<?php

namespace App\Repositories\MuscleGroups;

use Illuminate\Database\Eloquent\Collection;

interface MuscleGroupRepositoryInterface
{
    public function index(): Collection;
}

