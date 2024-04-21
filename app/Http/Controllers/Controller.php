<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Controller
{
    protected final function success(string $message = 'success', null|array|Collection|Model $data = null, int $code = 200): JsonResponse
    {
        return response()
            ->json(new ApiResponse(
                error: false,
                message: $message,
                data: $data
            ), $code);
    }

    protected final function error(string $message = 'An error occurred', int $code = 400): JsonResponse
    {
        return response()
            ->json(new ApiResponse(
                error: true,
                message: $message
            ), $code);
    }
}
