<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'content' => $this->faker->sentence('6'),
            'user_id' => rand(1,3),
        ];
    }
}
