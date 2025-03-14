<?php

namespace Database\Seeders;

use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permission()->sync($admin_permissions->pluck('id'));

        // get permission simple for admin
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });

        // for admin
        Role::findOrFail(2)->permission()->sync($user_permissions);
    }
}
