<?php

namespace App\Interface;

use App\Models\Payment;
use Illuminate\Support\Collection;

interface PaymentRepositoryInterface
{
    public function getData(): array;
    public function create(array $data): Payment;
}
