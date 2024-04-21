<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class UserController extends Controller
{
    public function get(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->load('wallets');
        $data = $user->toArray();

        return $this->success(
            message: 'user details',
            data: $data
        );
    }
}
