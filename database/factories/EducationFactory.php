<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'institution' => fake()->randomElement(['University of Rwanda', ' Carnegie Mellon University Africa', 'African Leadership University', 'IPRC Kigali']),
            'degree' => fake()->randomElement(['Bachelor of Science', 'Bachelor of Engineering', 'Associate Degree', 'Diploma']),
            'field_of_study' => fake()->randomElement(['Computer Science', 'Software Engineering', 'Information Technology', 'Computer Engineering']),
            'description' => fake()->paragraph(),
            'start_date' => fake()->dateTimeBetween('-5 years', '-3 years'),
            'end_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'is_current' => fake()->boolean(20),
            'order_column' => fake()->numberBetween(1, 3),
        ];
    }
}
