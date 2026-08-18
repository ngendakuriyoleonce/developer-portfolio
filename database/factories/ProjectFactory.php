<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->words(3, true);
        $title = ucfirst($title);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => fake()->sentence(),
            'full_description' => fake()->paragraphs(3, true),
            'problem' => fake()->paragraph(),
            'solution' => fake()->paragraph(),
            'features' => ['Authentication', 'CRUD Operations', 'REST API', 'Real-time Updates'],
            'technologies' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
            'github_url' => 'https://github.com/tahssin/' . Str::slug($title),
            'live_demo_url' => fake()->boolean(60) ? fake()->url() : null,
            'start_date' => fake()->dateTimeBetween('-1 year', '-6 months'),
            'completion_date' => fake()->dateTimeBetween('-5 months', 'now'),
            'is_featured' => fake()->boolean(30),
            'is_published' => true,
            'order_column' => fake()->numberBetween(1, 10),
        ];
    }
}
