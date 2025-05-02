<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Cek apakah email sudah diverifikasi
            if (is_null($user->email_verified_at)) {
                Auth::logout();
                return $this->sendError('Your email address is not verified.', [], 403);
            }

            $user['token'] = $user->createToken('API')->plainTextToken;
            return $this->sendResponse(new LoginResource($user), 'User login successfully.');
        } else {
            return $this->sendError('These credentials do not match our records.', [], 403);
        }
    }
}
