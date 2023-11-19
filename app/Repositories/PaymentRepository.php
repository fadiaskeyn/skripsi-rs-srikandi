<?php

namespace App\Repositories;

use App\Interface\PaymentRepositoryInterface;
use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getData(): array
    {
        return Payment::select('id', 'name')->get()->toArray();
    }

    public function create(array $data): Payment
    {
        return Payment::create([
            'name' => $data['name']
        ]);
    }

    public function destroy(Payment $payment): bool
    {
        return $payment->delete();
    }
}
