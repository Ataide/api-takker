<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filter>
 */
class FilterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'speed' => "Per offer",
            'minimum_after_duration' => fake()->randomNumber(2),
            'minimum_base_peroffer' => fake()->randomFloat(2, 0, 300),
            'start_time_padding' => fake()->randomNumber(2),
            'stop_after_catch' => fake()->boolean(),
        ];
    }
}
