<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = User::create(['name' => 'super-admin', 'email' => 'admin@example.com', 'number' => '09122717839', 'password'=> '12345678']);
        $user->assignRole('super-admin');
        $user->givePermissionTo('all');

        User::factory(3)->create();
    }
}
