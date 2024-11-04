<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage company',
            'manage jobs',
            'manage candidates',
            'apply job',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        // Employer Role and Permissions
        $employerRole = Role::firstOrCreate([
            'name' => 'employer',
        ]);

        $employerPermissions = [
            'manage company',
            'manage jobs',
            'manage candidates',
        ];

        $employerRole->syncPermissions($employerPermissions);

        // Employee Role and Permissions
        $employeeRole = Role::firstOrCreate([
            'name' => 'employee',
        ]);

        $employeePermissions = [
            'apply job',
        ];

        // Fix: Changed from $employerPermissions to $employeePermissions
        $employeeRole->syncPermissions($employeePermissions);

        // Super Admin Role
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
        ]);

        // Super Admin gets all permissions
        $superAdminRole->syncPermissions($permissions);

        // Create Super Admin User
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'occupation' => 'Superadmin',
            'experience' => 100,
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('123qwe123'),
        ]);

        $user->assignRole($superAdminRole);
    }
}