<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "posts_id" => Posts::inRandomOrder()->first()->id ?? Posts::factory(),
            "comment" => $this->faker->sentence(),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
