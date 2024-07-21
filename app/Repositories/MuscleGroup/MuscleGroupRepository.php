<?php

namespace App\Repositories\MuscleGroup;

use App\Models\MuscleGroup;
use App\Repositories\MuscleGroup\MuscleGroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class MuscleGroupRepository implements MuscleGroupRepositoryInterface
{
    public function index(): Collection
    {
        return MuscleGroup::all();
    }
}

