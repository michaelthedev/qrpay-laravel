<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\User;
use App\Services\User\WalletService;

final class UserObserver
{
    public function created(User $user): void
    {
        $walletService = new WalletService();

        $walletService->createDefaultWallets($user);
    }
}
