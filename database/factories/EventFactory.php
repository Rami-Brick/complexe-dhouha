<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => $this->faker->word(),
            'event_date' => $this->faker->date(),
            'event_fee' => $this->faker->randomDigit(),
            'age_group' => $this->faker->randomElement(['1-2 ans', '2-3 ans', '3 ans', '4 ans', '5 ans']),
        ];
    }
}
