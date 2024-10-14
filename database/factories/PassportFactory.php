<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passport>
 */
class PassportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'passport_number' => strtoupper(fake()->regexify('[A-Z0-9]{8}')), 
            'issued_date' => fake()->date('Y-m-d', 'now'),
            'expiry_date' => fake()->date('Y-m-d', '+10 years'), 
        ];
    }
}
