<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            //'profile_id' => Profile::first()->id,
            'title' => fake()->realTextBetween(20, 150),
            'slug' => fake()->slug,
            //'category_id' => Category::inRandomOrder()->first()->id,
            'category_id' => Category::factory(),
            'image_path' => fake()->imageUrl,
            'description' => fake()->realTextBetween(100, 300),
            'content' => fake()->realTextBetween(300, 600),
            'published_at' => fake()->dateTime,
            'status' => fake()->randomElement([1, 0]),
            'is_published' => fake()->boolean(),
            'profile_id' => Profile::inRandomOrder()->first()->id,
        ];
    }
}
