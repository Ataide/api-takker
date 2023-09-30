<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElements([
                'Carson CA (VAX3) - Sub Same-Day',
                'Carson CA (VX3) - Sub Same-Day',
                'York CA (DDS3) - Sub Same-Day',
                'Carson CA (V3) - Same-Day',
            ], 1)[0],
            'per_hour' => fake()->randomFloat(2, 10, 100),
            'per_offer' => fake()->randomFloat(2, 10, 100),
            'updated' => fake()->dateTimeThisMonth(),
            'end_date' => fake()->dateTimeThisMonth(),
            'start_date' => fake()->dateTimeThisMonth(),
            'status' => fake()->randomElements([
                'gone',
                'caught',
                'ignored',
            ], 1)[0],
        ];
    }
}
