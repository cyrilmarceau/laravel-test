<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\MuscleGroup;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $with = ['muscleGroups'];

    public function muscleGroups()
    {
        return $this->belongsToMany(MuscleGroup::class);
    }
}
