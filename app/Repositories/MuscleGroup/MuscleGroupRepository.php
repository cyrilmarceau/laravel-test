<?php

namespace App\Repositories\MuscleGroup;

use App\Models\MuscleGroup;
use App\Repositories\MuscleGroups\MuscleGroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class MuscleGroupsRepository implements MuscleGroupRepositoryInterface
{
    public function index(): Collection
    {
        return MuscleGroup::all();
    }
}

