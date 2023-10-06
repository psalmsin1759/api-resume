<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experiences>
 */
class ExperiencesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'company' => $this->faker->company,
            'date_range' => $this->faker->date($format = 'Y-m-d', $max = 'now') . ' - ' . $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user_id' => User::factory(),
        ];
    }
}
