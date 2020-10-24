<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions to be assigned to users
        //USER PERMISSIONS
        $permission_createuser = Permission::where('name', 'create-user')->first();
        $permission_showuser = Permission::where('name', 'show-user')->first();
        $permission_updateuser = Permission::where('name', 'update-user')->first();
        $permission_deleteuser = Permission::where('name', 'delete-user')->first();
        //ROLE PERMISSIONS
        $permission_createrole = Permission::where('name', 'create-role')->first();
        $permission_showrole = Permission::where('name', 'show-role')->first();
        $permission_updaterole = Permission::where('name', 'update-role')->first();
        $permission_deleterole = Permission::where('name', 'delete-role')->first();



        //SUPER ADMIN
        $role_super_admin = new Role();
        $role_super_admin->name = 'SuperAdmin';
        $role_super_admin->guard_name = 'web';
        $role_super_admin->description = 'A Super Administrator usually a Zimswitch user';
        $role_super_admin->save();
        $role_super_admin->givePermissionTo(Permission::all());

        //ZIMSWITCH ADMIN
        $role_admin = new Role();
        $role_admin->name = 'ZimswitchAdmin';
        $role_admin->guard_name = 'web';
        $role_admin->description = 'An Admin User is the bank administrator who maintains bank users';
        $role_admin->save();
        //USER
        $role_admin->givePermissionTo($permission_createuser);
        $role_admin->givePermissionTo($permission_showuser);
        $role_admin->givePermissionTo($permission_updateuser);
        $role_admin->givePermissionTo($permission_deleteuser);
        //ROLE
        $role_admin->givePermissionTo($permission_createrole);
        $role_admin->givePermissionTo($permission_showrole);
        $role_admin->givePermissionTo($permission_updaterole);
        $role_admin->givePermissionTo($permission_deleterole);
    }
}
