<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            KategoriSeeder::class,
            LokasiSeeder::class,
            BarangSeeder::class,
        ]);

        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);

        $petugas = User::factory()->create([
            'name' => 'Petugas Inventaris',
            'email' => 'petugas@mail.com',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('admin');
        $petugas->assignRole('petugas');
    }
}