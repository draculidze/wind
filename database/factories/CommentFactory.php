<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'post_id' => Post::factory(),
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'parent_id' => null,
            'commentable_type' => Post::class,
            'commentable_id' => Post::factory(),
            'content' => fake()->realTextBetween(10, 1000),
        ];
    }
}
