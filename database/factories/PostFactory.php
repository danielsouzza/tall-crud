<?php

namespace Database\Factories;

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
            "title" => fake()->realText(50),
            "slug" => fake()->realText(50),
            "thumbnail" => fake()->imageUrl(),
            "body" => fake()->realText(5000),
            "active" => fake()->boolean(),
            "published_at" =>fake()->dateTime(),
            "user_id" => 1
        ];
    }
}
