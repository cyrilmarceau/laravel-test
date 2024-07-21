<?php

namespace App\Http\Controllers;

use App\Http\Resources\MuscleGroupsRessource;
use App\Http\Responses\ApiResponse;
use App\Repositories\MuscleGroups\MuscleGroupRepositoryInterface;

class MuscleGroupController extends Controller
{

    protected $muscleGroupsRepository;

    public function __construct(MuscleGroupRepositoryInterface $muscleGroupsRepository)
    {
        $this->muscleGroupsRepository = $muscleGroupsRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $muscleGroups = $this->muscleGroupsRepository->index();
        return ApiResponse::success(
                new MuscleGroupsRessource($muscleGroups),
            'Muscle groups retrieved successfully'
        );
    }
}
