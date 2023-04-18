<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'token' => $user->createToken('token')->accessToken,
        ]);

    }
}
