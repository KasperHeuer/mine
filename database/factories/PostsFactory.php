<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => User::inRandomOrder()->first()->id ?? User::factory(),
            "head" => fake()->sentence(),
            "text" => fake()->paragraph(),
            "image" => fake()->imageUrl(),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
    
}
