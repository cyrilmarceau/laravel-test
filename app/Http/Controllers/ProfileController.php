<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdatePasswordProfilRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use App\Repositories\Profile\ProfileRepositoryInterface;
use Illuminate\Http\Request;



class ProfileController extends Controller
{
    protected $profileRepository; 

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getProfile(Request $request)
    {
        $user = $this->profileRepository->getProfile($request->user());

        return ApiResponse::success(new UserResource($user), "Bon retour $user->firstname 👋");
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->profileRepository->updateProfile($request->validated());

        return ApiResponse::success(new UserResource($request->user()), 'Profil mis à jour avec succès');
    }

    public function updatePassword(UpdatePasswordProfilRequest $request)
    {
        $result = $this->profileRepository->updatePassword($request->validated());

        if (isset($result)) {
            return ApiResponse::error('Error', $result, 400);
        }

        return ApiResponse::success(null, 'Mot de passe mis à jour avec succès');
    }
}