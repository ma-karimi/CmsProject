<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{

    public function run()
    {

        Tag::factory()->count(100)->create();
    }
}
