<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SocialLinkFactory extends Factory
{
    public function definition(): array
    {
        $platform = fake()->randomElement(['github', 'linkedin', 'twitter', 'dev.to']);
        return [
            'platform' => $platform,
            'url' => 'https://' . $platform . '.com/tahssin',
            'icon' => $platform,
            'is_active' => true,
            'order_column' => fake()->numberBetween(1, 4),
        ];
    }
}
