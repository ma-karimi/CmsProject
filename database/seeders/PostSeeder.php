<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{

    public function run()
    {
        $categories=Category::all();
        $tags=Tag::all();
        Post::factory()->count(20)->create()->each(function ($post) use ($categories, $tags){
            $post->categories()->attach($categories->random(rand(1, 5)));
            $post->tags()->attach($tags->random(rand(3, 10)));
            Image::factory()->create(['imageable_type' => "App\Models\Post", 'imageable_id'=>$post->id]);
        });
    }
}
