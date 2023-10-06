<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Experiences;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsibilities>
 */
class ResponsibilitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'details' => $this->faker->sentence,
            'experiences_id' => Experiences::factory(),
        ];
    }
}
