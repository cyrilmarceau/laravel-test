<?php

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function index(): Collection
    {
        return Exercise::all();
    }
}