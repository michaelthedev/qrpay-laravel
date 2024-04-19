<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => Str::slug($data['username']),
            'password' => bcrypt($data['password'])
        ]);

        return $this->success(
            code: 201,
            message: 'Registration successful'
        );
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)
            ->first();

        if (!Auth::attempt($request->only('username', 'password'))) {
            return $this->error(
                code: 401,
                message: 'Invalid credentials'
            );
        }

        return $this->success(
            message: 'Login Successful',
            data: [
                'token' => $user->createToken('auth_token')
                    ->plainTextToken,
                'token_type' => 'Bearer',
            ]
        );
    }
}
