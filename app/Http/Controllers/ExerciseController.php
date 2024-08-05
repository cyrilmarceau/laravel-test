<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Http\Requests\Exercise\UpdateExerciseRequest;
use App\Http\Resources\ExerciseRessource;
use App\Http\Responses\ApiResponse;
use App\Models\Exercise;
use App\Repositories\Exercise\ExerciseRepositoryInterface;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{

    protected $exerciseRepository;

    public function __construct(ExerciseRepositoryInterface $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $exercises = $this->exerciseRepository->index();

        $messages = ['non_field_successes' => ["Exercises retrieved successfully"]];

        return ApiResponse::ok(
            data: $exercises,
            messages: $messages
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        $exercise = $this->exerciseRepository->show($exercise);

        $messages = ['non_field_successes' => ["Exercise retrieved successfully"]];
        return ApiResponse::ok(
            data: new ExerciseRessource($exercise),
            messages: $messages
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
