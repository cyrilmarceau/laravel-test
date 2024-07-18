<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Repositories\MuscleGroups\MuscleGroupsRepositoryInterface;

class MuscleGroupsController extends Controller
{

    protected $muscleGroupsRepository;

    public function __construct(MuscleGroupsRepositoryInterface $muscleGroupsRepository)
    {
        $this->muscleGroupsRepository = $muscleGroupsRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $muscleGroups = $this->muscleGroupsRepository->index();

        return ApiResponse::success($muscleGroups, 'Muscle groups retrieved successfully');
    }
}
