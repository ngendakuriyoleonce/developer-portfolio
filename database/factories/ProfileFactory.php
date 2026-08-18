<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => 'Full-Stack Laravel Developer',
            'bio' => fake()->paragraphs(3, true),
            'short_bio' => fake()->sentence(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'location' => 'Kigali, Rwanda',
            'career_objective' => fake()->paragraph(),
            'developer_journey' => fake()->paragraph(),
            'current_focus' => 'Building scalable web applications with Laravel and modern tools',
            'personal_statement' => fake()->paragraph(),
        ];
    }
}
