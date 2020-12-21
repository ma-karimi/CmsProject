<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = User::create(['name' => 'admin', 'email' => 'admin@example.com', 'number' => '09122717839', 'password'=> '12345678']);
        $role = Role::create(['name'=>'admin']);
        $user->assignRole($role);

        User::factory(10)->create();
    }
}
