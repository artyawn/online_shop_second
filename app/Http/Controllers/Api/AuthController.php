<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }

        return response()->json([
            'token' => Auth::user()->createToken('token')->accessToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'You are logout successfully'
        ]);
    }

    public function me(){

         return new UserResource(auth()->user());
    }
}
