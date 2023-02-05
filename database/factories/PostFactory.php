<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Post::class;


    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'sub_title'=> fake()->sentence(),
            'description' => fake()->paragraph(),
            'slug'=> Str::slug(fake()->sentence())
        ];
    }
}
