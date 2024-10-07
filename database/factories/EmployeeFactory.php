<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'phone' => fake()->phoneNumber,
            'date_of_birth' => fake()->date,
            'hire_date' => fake()->dateTime,
            'salary' => fake()->randomFloat(2, 30000, 90000),
            'is_active' => fake()->boolean,
            'department_id' => fake()->randomDigitNotNull,
            'manager_id' => fake()->randomDigitNotNull,
            'address' => fake()->address,
            'profile_picture' => null,
        ];
    }
}
