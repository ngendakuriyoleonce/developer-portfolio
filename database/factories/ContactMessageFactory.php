<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'subject' => fake()->sentence(),
            'message' => fake()->paragraphs(2, true),
            'is_read' => fake()->boolean(30),
            'read_at' => fake()->boolean(30) ? fake()->dateTimeBetween('-1 week', 'now') : null,
        ];
    }
}
