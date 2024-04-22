<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class TransactionController extends Controller
{
    public function get(Request $request): JsonResponse
    {
        $user = $request->user();

        return $this->success(
            message: 'user transactions',
            data: $user->transactions()
                ->latest()->paginate()
        );
    }

    public function filter(Request $request, string $filter): void
    {}
}
