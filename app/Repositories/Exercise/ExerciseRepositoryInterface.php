<?php

namespace App\Repositories\Exercise;

use Illuminate\Database\Eloquent\Collection;

interface ExerciseRepositoryInterface
{
    public function index(): Collection;
}