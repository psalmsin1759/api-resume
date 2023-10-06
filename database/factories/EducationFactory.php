<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'institution' => $this->faker->sentence,
            'degree' => $this->faker->word,
            'date-range' => $this->faker->year . ' - ' . $this->faker->year,
            'user_id' => User::factory(),
        ];
    }
}
