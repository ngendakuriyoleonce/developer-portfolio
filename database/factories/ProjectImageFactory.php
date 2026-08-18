<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'image_path' => 'projects/' . fake()->uuid() . '.jpg',
            'caption' => fake()->sentence(),
            'order_column' => fake()->numberBetween(1, 5),
        ];
    }
}
