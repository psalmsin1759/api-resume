<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Projects;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stacks>
 */
class StacksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'projects_id' => Projects::factory(),
        ];
    }
}
