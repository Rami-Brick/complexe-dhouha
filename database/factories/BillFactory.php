<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'due_date' => $this->faker->date(),
            'products' => $this->faker->word(),
            'amount' => $this->faker->randomDigit(),
            'paid_amount' => $this->faker->randomDigit(),
            'status' => $this->faker->word(),
            'student_id' => Student::factory(),
        ];
    }
}
