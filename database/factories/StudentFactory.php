<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Relative;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'course_id' => Course::factory(), // Assuming you have a Class model and factory
            'gender' => $this->faker->randomElement(['boy', 'girl']),
            'relative_id' => Relative::factory(), // Assuming you have a Parent model and factory
            'payment_status' => $this->faker->randomElement(['Paid','Overdue','Partial']),
            'comments' => $this->faker->optional()->text(),
            'event_participation' => $this->faker->word(),
            'leave_with' => $this->faker->word(),
        ];
    }
}
