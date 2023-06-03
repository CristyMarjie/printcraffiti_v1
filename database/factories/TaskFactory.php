<?php

namespace Database\Factories;

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
        // avatar, name, description, priority, completed
        return [
            'avatar' => null,
            'user_id' => 1,
            'description' => $this->faker->sentence(1),
            'priority_id' => 1,
            'completed' => false
        ];
    }
}
