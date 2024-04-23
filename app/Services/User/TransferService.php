<?php

declare(strict_types=1);

namespace App\Services\User;

final class TransferService
{
    public function supportedCurrencies(): array
    {
        // make a db call here or something
        return ['NGN', 'USD', 'GBP', 'EUR'];
    }

}
