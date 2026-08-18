<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        // Create permissions
        $permissions = [
            'manage-profile',
            'manage-skills',
            'manage-experience',
            'manage-education',
            'manage-certifications',
            'manage-projects',
            'manage-services',
            'manage-messages',
            'manage-social-links',
            'manage-users',
            'manage-roles',
            'manage-settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Admin gets all permissions
        $adminRole->givePermissionTo($permissions);

        // Editor gets limited permissions
        $editorRole->givePermissionTo([
            'manage-projects',
            'manage-skills',
            'manage-experience',
        ]);

        // Assign admin role to the admin user
        $admin = User::where('email', 'admin@portfolio.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }
    }
}
