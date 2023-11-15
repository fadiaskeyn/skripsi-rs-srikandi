<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kepalaRm = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
        ]);

        $pendaftaran = User::factory()->create([
            'name' => 'Petugas Pendaftaran',
            'email' => 'pendaftaran@mail.com',
            'password' => Hash::make('pendaftaran123'),
        ]);

        $ruangRI = User::factory()->create([
            'name' => 'Petugas Ruang RI',
            'email' => 'ruangri@mail.com',
            'password' => Hash::make('ruangri123'),
        ]);

        $pelaporan = User::factory()->create([
            'name' => 'Petugas Pelaporan',
            'email' => 'pelaporan@mail.com',
            'password' => Hash::make('pelaporan123'),
        ]);

        $kepalaRm->assignRole('kepala-rm');
        $pendaftaran->assignRole('pendaftaran');
        $ruangRI->assignRole('ruang-ri');
        $pelaporan->assignRole('pelaporan');
    }
}
