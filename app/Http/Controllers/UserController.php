<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordProfilRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfile(Request $request)
    {
        $user = $this->userRepository->getProfile($request->user());

        return ApiResponse::success([
            'user' => new UserResource($user),
        ], "Bon retour $user->firstname 👋");
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->userRepository->updateProfile($request->validated());

        return ApiResponse::success([
            'user' => new UserResource($request->user()),
        ], 'Profil mis à jour avec succès');
    }

    public function updatePassword(UpdatePasswordProfilRequest $request)
    {
        $result = $this->userRepository->updatePassword($request->validated());

        if (isset($result)) {
            return ApiResponse::error('Error', $result, 400);
        }

        return ApiResponse::success(null, 'Mot de passe mis à jour avec succès');
    }
}