<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'all']);
        Permission::create(['name' => 'writer']);
        Permission::create(['name' => 'publisher']);
        Permission::create(['name' => 'manager']);
        Permission::create(['name' => 'creator']);
    }
}
