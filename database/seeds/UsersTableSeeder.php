<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role as Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = Role::where('name', 'SuperAdmin')->first();
        $role_admin = Role::where('name', 'ZimswitchAdmin')->first();

        $super_admin = new User();
        $super_admin->name = 'Mura Nhekairo';
        $super_admin->first_name = 'Mura';
        $super_admin->last_name = 'Nhekairo';
        $super_admin->email = 'mnhekairo@zimswitch.co.zw';
        $super_admin->verified = 1;
        $super_admin->password = '$2y$10$c7dlQtQB.l9tJRpvthcUzewOlrzL6OWVUOTOBqWA4Eb9FuGKBEXvq';
        $super_admin->save();
        $super_admin->assignRole($role_super_admin);

        $admin = new User();
        $admin->name = 'Kundai Danger';
        $admin->first_name = 'Kundai';
        $admin->last_name = 'Danger';
        $admin->email = 'humphreykhd@gmail.com';
        $admin->verified = 1;
        $admin->password = '$2y$10$c7dlQtQB.l9tJRpvthcUzewOlrzL6OWVUOTOBqWA4Eb9FuGKBEXvq';
        $admin->save();
        $admin->assignRole($role_admin);
    }
}
