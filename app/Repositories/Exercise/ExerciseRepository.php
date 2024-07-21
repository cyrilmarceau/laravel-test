<?php

namespace App\Repositories\Exercise;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function index(): Collection
    {
        return Exercise::with('muscleGroups')->get();
    }
}