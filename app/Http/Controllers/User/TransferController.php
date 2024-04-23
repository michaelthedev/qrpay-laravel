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

    private function getService(): TransferService
    {
        return new TransferService();
    }
}
