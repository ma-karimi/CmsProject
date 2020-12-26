<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = User::create(['name' => 'super-admin', 'email' => 'super-admin@example.com', 'number' => '09122717839', 'password'=> '12345678']);
        $user->assignRole('super-admin');
        $user->givePermissionTo('manager','creator','publisher','writer');

        $user = User::create(['name' => 'admin', 'email' => 'admin@example.com', 'number' => '09122717849', 'password'=> '12345678']);
        $user->assignRole('admin');
        $user->givePermissionTo('manager','creator','publisher','writer');

        $user = User::create(['name' => 'admin1', 'email' => 'admin1@example.com', 'number' => '09122717859', 'password'=> '12345678']);
        $user->assignRole('admin');
        $user->givePermissionTo('manager','creator','publisher','writer');

        $user = User::create(['name' => 'user', 'email' => 'user@example.com', 'number' => '09122717869', 'password'=> '12345678']);
        $user->assignRole('user');
        $user->givePermissionTo('guest');
    }
}
