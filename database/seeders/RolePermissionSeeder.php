<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Permission
        Permission::create(['name' => 'manage barang']);
        Permission::create(['name' => 'delete barang']);
        Permission::create(['name' => 'view kategori']);
        Permission::create(['name' => 'manage kategori']);
        Permission::create(['name' => 'view lokasi']);
        Permission::create(['name' => 'manage lokasi']);

        // Role Admin
        $admin = Role::create([
            'name' => 'admin',
        ]);

        // Role Petugas
        $petugas = Role::create([
            'name' => 'petugas',
        ]);

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        | Admin memiliki seluruh permission.
        */
        $admin->givePermissionTo(Permission::all());

        /*
        |--------------------------------------------------------------------------
        | PETUGAS
        |--------------------------------------------------------------------------
        | Petugas hanya dapat mengelola barang,
        | melihat kategori, serta melihat dan mengelola lokasi.
        | Tidak dapat mengelola kategori maupun menghapus barang.
        */
        $petugas->givePermissionTo([
            'manage barang',
            'view kategori',
            'view lokasi',
            'manage lokasi',
        ]);
    }
}