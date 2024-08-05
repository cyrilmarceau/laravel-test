<?php

namespace App\Repositories\Exercise;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Filters\Filter;

class OwnerFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if ($value === 'me') {
            $query->where('user_id', Auth::id());
        } elseif ($value === 'predefined') {
            $query->whereNull('user_id');
        } elseif ($value === 'all') {
            $query->where('user_id', Auth::id())
                ->orWhereNull('user_id');
        } else {
            $query->where('user_id', $value);
        }
    }
}

class ExerciseRepository implements ExerciseRepositoryInterface
{
    public function index(): Collection
    {
        $users = QueryBuilder::for(Exercise::class)
            ->with('muscleGroups')
            ->allowedFilters([
                AllowedFilter::custom('owner', new OwnerFilter()),
                AllowedFilter::exact('muscle_groups', 'muscleGroups.id'),
                'name',
            ])
            ->get();

        return $users;
    }

    public function show(Exercise $exercise): Exercise
    {
        return $exercise::first();
    }
}
