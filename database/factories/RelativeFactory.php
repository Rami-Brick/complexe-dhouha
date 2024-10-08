<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Relative>
 */
class RelativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_name' => $this->faker->name(),
            'mother_name' => $this->faker->name(),
            'phone_father' => $this->faker->phoneNumber(),
            'phone_mother' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'job_father' => $this->faker->jobTitle(),
            'job_mother' => $this->faker->jobTitle(),
            'cin_father' => $this->faker->creditCardNumber(),
            'cin_mother' => $this->faker->creditCardNumber(),
            'notes' => $this->faker->text(),
        ];
    }
}
