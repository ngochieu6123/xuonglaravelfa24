<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'IT',
            'Economics',
            'Law ',
            'Marketing',
            'Music ',
        ];
        return [
            'name' => fake()->randomElement($subjects),
            'teacher_name' => fake()->name(),
        ];
    }
}
