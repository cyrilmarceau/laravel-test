<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Exercise;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MuscleGroup extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }
}
