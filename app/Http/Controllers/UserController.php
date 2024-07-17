<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function getProfile(Request $request) {
        $user = $request->user();

        return ApiResponse::success([
            'user' => new UserResource($user),
        ], "Bon retour $user->firstname 👋");
    }
}
