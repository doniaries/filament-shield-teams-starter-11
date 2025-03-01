<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $adminOpd = Role::firstOrCreate(['name' => 'admin_opd', 'guard_name' => 'web']);
        $pegawai = Role::firstOrCreate(['name' => 'pegawai', 'guard_name' => 'web']);
        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to super_admin
        $superAdmin->syncPermissions($permissions);

        // Assign specific permissions to admin_opd
        $adminOpd->syncPermissions($permissions->filter(function ($permission) {
            return !str_contains($permission->name, 'role');
        }));
        $pegawai->syncPermissions($permissions->filter(function ($permission) {
            return !str_contains($permission->name, 'role');
        }));
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
