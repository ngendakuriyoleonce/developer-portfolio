<?php

namespace Database\Factories;

use App\Models\SkillCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SkillFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'skill_category_id' => SkillCategory::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'proficiency' => fake()->numberBetween(60, 100),
            'icon' => null,
            'order_column' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
