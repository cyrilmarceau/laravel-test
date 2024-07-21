<?php

use Illuminate\Database\Eloquent\Collection;

interface ExerciseRepositoryInterface
{
    public function index(): Collection;
}