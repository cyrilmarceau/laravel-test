<?php

namespace App\Repositories\Exercise;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;

interface ExerciseRepositoryInterface
{
    public function index(): Collection;
    public function show(Exercise $exercise): Exercise;
}
