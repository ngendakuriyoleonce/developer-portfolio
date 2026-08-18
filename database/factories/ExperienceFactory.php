<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    public function definition(): array
    {
        $isCurrent = fake()->boolean(30);
        return [
            'job_title' => fake()->randomElement(['Junior Laravel Developer', 'Full-Stack Developer', 'Web Developer', 'Backend Developer']),
            'company' => fake()->company(),
            'location' => fake()->city() . ', ' . fake()->country(),
            'description' => fake()->paragraph(),
            'responsibilities' => [fake()->sentence(), fake()->sentence(), fake()->sentence()],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Redis', 'Docker'],
            'start_date' => fake()->dateTimeBetween('-3 years', '-1 year'),
            'end_date' => $isCurrent ? null : fake()->dateTimeBetween('-1 month', 'now'),
            'is_current' => $isCurrent,
            'is_published' => true,
            'order_column' => fake()->numberBetween(1, 5),
        ];
    }
}
