<?php

namespace App\Http\Controllers;

use App\Http\Resources\MuscleGroupRessource;
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

        $messages = ['non_field_successes' => ['Muscle groups retrieved successfully']];

        return ApiResponse::ok(
            data: MuscleGroupRessource::collection($muscleGroups),
            messages: $messages
        );
    }
}
