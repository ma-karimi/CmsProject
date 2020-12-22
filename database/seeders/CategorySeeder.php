<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::factory()->count(2)->create()->each(function ($category){
            Image::factory()->create(['imageable_type' => Category::class, 'imageable_id'=>$category->id]);
        });
    }
}

