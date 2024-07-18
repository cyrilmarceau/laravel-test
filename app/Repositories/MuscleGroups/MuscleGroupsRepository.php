<?php

namespace App\Repositories\MuscleGroups;

use App\Models\MuscleGroups;
use Illuminate\Database\Eloquent\Collection;

class MuscleGroupsRepository implements MuscleGroupsRepositoryInterface
{
    public function index(): Collection
    {
        return MuscleGroups::all();
    }
}

