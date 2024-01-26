<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'points' => $request->points=0
        ];

        $user = User::create($userData);
        $token = $user->createToken('user_token')->plainTextToken;

        return response([
            'token' => $token,
           'user' => $user
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'Invalid credential'
            ], 422);
        }

        $token = $user->createToken('user_token')->plainTextToken;

        return response([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function user()
    {
        return response()->json(auth()->user());
    }

    public function show()
    {
        $user = User::all();

        return response([
            'message' => 'List User',
            'data' => $user
        ], 200);
    }
}
