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
        $categories = Category::all();
        $tags = Tag::all();
        Post::factory()->count(5)->create()->each(function ($post) use ($categories, $tags) {
            $post->categories()->attach($categories->random(rand(1, 2)));
            $post->tags()->attach($tags->random(rand(1, 2)));
            Image::factory()->create(['imageable_type' => Post::class, 'imageable_id' => $post->id]);
        });
    }
}
