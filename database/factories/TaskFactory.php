<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'titel' => fake()->sentence(5),
            'is_done' => fake()->randomElement([0, 1]),
            'created_at' => now(), // Assuming 'created_at' is a timestamp
            // 'creator_id' => User::factory(),
            'creator_id' => 1,
        ];
    }
}
