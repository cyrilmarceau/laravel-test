<?php

namespace App\Http\Controllers;

use App\Http\Resources\MuscleGroupsRessource;
use App\Http\Responses\ApiResponse;
use App\Repositories\MuscleGroup\MuscleGroupRepositoryInterface;

class MuscleGroupController extends Controller
{

    protected $muscleGroupRepository;

    public function __construct(MuscleGroupRepositoryInterface $muscleGroupRepository)
    {
        $this->muscleGroupRepository = $muscleGroupRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $muscleGroups = $this->muscleGroupRepository->index();
        return ApiResponse::success(
                new MuscleGroupsRessource($muscleGroups),
            'Muscle groups retrieved successfully'
        );
    }
}
