<?php

namespace Database\Seeders;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();
        $timestamps = [
            'created_at' => $now,
            'updated_at' => $now,
        ];

        Payment::insert([
            array_merge(['name' => 'UMUM'], $timestamps),
            array_merge(['name' => 'BPJS'], $timestamps),
            array_merge(['name' => 'ASURANSI'], $timestamps),
        ]);
    }
}
