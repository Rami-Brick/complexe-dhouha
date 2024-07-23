<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_name' => $this->faker->word(),
            'level' => $this->faker->randomElement(['bébé', '1-2 ans', '2-3 ans', '3 ans', '4 ans', '5 ans']),
            'staff_id' => Staff::factory(),
        ];
    }
}
