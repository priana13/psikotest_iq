<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
			'user_id' => $this->faker->name,
			'category_id' => $this->faker->name,
			'slug' => $this->faker->name,
			'title' => $this->faker->name,
			'body' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
