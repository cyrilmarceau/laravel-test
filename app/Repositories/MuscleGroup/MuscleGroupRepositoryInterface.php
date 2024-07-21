<?php

namespace App\Repositories\MuscleGroup;

use Illuminate\Database\Eloquent\Collection;

interface MuscleGroupRepositoryInterface
{
    public function index(): Collection;
}

