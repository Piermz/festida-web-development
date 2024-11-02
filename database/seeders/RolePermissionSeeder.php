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
            'manage applicants',
            'apply job',

        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }
        $employerRole = Role::firstOrCreate([
            'name' => 'employer',
        ]);

        $employerPermissions =[
            'manage company',
            'manage jobs',
            'manage applicants',
        ];

        $employerRole->syncPermissions($employerPermissions);

        $employeeRole = Role::firstOrCreate([
            'name' => 'employee',
        ]); 

        $employeePermissions =[
            'apply job',
        ];

        $employeeRole->syncPermissions($employerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
        ]);

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
