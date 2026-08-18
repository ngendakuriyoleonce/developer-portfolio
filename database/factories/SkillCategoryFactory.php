<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SkillCategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'icon' => fake()->randomElement(['code', 'palette', 'database', 'server', 'cloud']),
            'order_column' => fake()->numberBetween(1, 10),
        ];
    }
}
