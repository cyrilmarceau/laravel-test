<?php

use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\MuscleGroupController;
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\MuscleGroupsController;
use App\Http\Controllers\ProfileController;
>>>>>>> main
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [ProfileController::class, 'getProfile']);
    Route::patch('profile', [ProfileController::class, 'updateProfile']);
    Route::patch('profile/password', [ProfileController::class, 'updatePassword']);

    Route::resource('muscle-groups', MuscleGroupController::class)->only(['index']);
});

