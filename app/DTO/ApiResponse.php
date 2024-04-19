<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ApiResponse
{
    public function __construct(
        public bool $error,
        public string $message,
        public null|array|Collection|Model $data = null
    ) {}

    public final function toArray(): array
    {
        return get_object_vars($this);
    }
}
