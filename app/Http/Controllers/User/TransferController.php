<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\User\TransferService;
use App\Http\Controllers\Controller;

final class TransferController extends Controller
{
    public function currencies(): JsonResponse
    {
        $service = $this->getService();

        return $this->success(
            'Supported currencies',
            $service->supportedCurrencies()
        );
    }

    public function validate(Request $request): JsonResponse
    {
        $request->validate([
            'username' => 'required|string'
        ]);

        $user = User::where('username', $request->username)
            ->first();

        if (!$user) {
            return $this->error('User not found', 404);
        }

        return $this->success(
            'User found',
            $user->only([
                'first_name', 'last_name',
                'name', 'username'
            ])
        );
    }

    private function getService(): TransferService
    {
        return new TransferService();
    }
}
