<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;

final class WalletService
{
    public function createDefaultWallets(User $user): void
    {
        $defaultCurrencies = ['NGN', 'USD', 'GBP', 'EUR'];

        foreach ($defaultCurrencies as $currency) {
            $user->wallets()->create([
                'user_id' => $user->id,
                'balance' => 0,
                'currency' => $currency,
            ]);
        }
    }
}
