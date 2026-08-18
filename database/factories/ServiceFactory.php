<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->randomElement([
            'Laravel Development',
            'PHP Development',
            'REST API Development',
            'Database Design & Development',
            'Web Application Development',
            'Website Maintenance & Support',
        ]);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(),
            'icon' => fake()->randomElement(['code', 'globe', 'database', 'server', 'shield', 'wrench']),
            'features' => [fake()->sentence(), fake()->sentence(), fake()->sentence()],
            'is_published' => true,
            'order_column' => fake()->numberBetween(1, 6),
        ];
    }
}
