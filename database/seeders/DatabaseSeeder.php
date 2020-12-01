<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,

        ]);
    }
}
