<?php

namespace Database\Seeders;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => UserRole::SUPER_ADMIN]);
        $adminRole = Role::firstOrCreate(['name' => UserRole::ADMIN]);
        $staff = Role::firstOrCreate(['name' => UserRole::STAFF]);
        $student = Role::firstOrCreate(['name' => UserRole::STUDENT]);

        Permission::firstOrCreate(['name' => UserPermission::CREATE_USERS]);
        Permission::firstOrCreate(['name' => UserPermission::SHOW_USERS]);
        Permission::firstOrCreate(['name' => UserPermission::CHANGE_PASSWORD_OF_ADMIN]);
        Permission::firstOrCreate(['name' => UserPermission::CHANGE_PASSWORD_OF_STUDENT]);
        Permission::firstOrCreate(['name' => UserPermission::UPLOAD_FILES]);
        Permission::firstOrCreate(['name' => UserPermission::DOWNLOAD_FILES]);
        Permission::firstOrCreate(['name' => UserPermission::DELETE_USERS]);

        //********super admin *********//
        $superAdminRole->givePermissionTo(UserPermission::CREATE_USERS);
        $superAdminRole->givePermissionTo(UserPermission::SHOW_USERS);
        $superAdminRole->givePermissionTo(UserPermission::DELETE_USERS);
        $superAdminRole->givePermissionTo(UserPermission::CHANGE_PASSWORD_OF_ADMIN);
        $superAdminRole->givePermissionTo(UserPermission::UPLOAD_FILES);
        $superAdminRole->givePermissionTo(UserPermission::DOWNLOAD_FILES);


        //********admin *********//
        $adminRole->givePermissionTo(UserPermission::CREATE_USERS);
        $adminRole->givePermissionTo(UserPermission::SHOW_USERS);
        $adminRole->givePermissionTo(UserPermission::CHANGE_PASSWORD_OF_STAFF);
        $adminRole->givePermissionTo(UserPermission::UPLOAD_FILES);
        $adminRole->givePermissionTo(UserPermission::DOWNLOAD_FILES);

        //********staff *********//
        $staff->givePermissionTo(UserPermission::CHANGE_PASSWORD_OF_STUDENT);
        $staff->givePermissionTo(UserPermission::SHOW_USERS);

    }
}
