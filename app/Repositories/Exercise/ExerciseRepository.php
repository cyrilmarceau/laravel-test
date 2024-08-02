<?php

namespace App\Repositories\Exercise;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function index(): Collection
    {
        return Exercise::get();
    }

    public function show(Exercise $exercise): Exercise
    {
        return $exercise::first();
    }
}
