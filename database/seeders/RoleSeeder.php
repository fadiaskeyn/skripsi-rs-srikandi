<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'kepala-rm']);
        Role::create(['name' => 'pendaftaran']);
        Role::create(['name' => 'ruang-ri']);
        Role::create(['name' => 'pelaporan']);
    }
}
