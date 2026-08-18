<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Laravel Certified Developer',
                'PHP Professional Certification',
                'MySQL Database Administration',
                'AWS Cloud Practitioner',
                'Docker Essentials',
            ]),
            'issuing_organization' => fake()->randomElement(['Laravel', 'PHP Institute', 'Oracle', 'AWS', 'Docker Inc']),
            'issue_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'expiry_date' => fake()->boolean(50) ? fake()->dateTimeBetween('+6 months', '+2 years') : null,
            'credential_id' => fake()->uuid(),
            'credential_url' => fake()->url(),
            'is_published' => true,
            'order_column' => fake()->numberBetween(1, 5),
        ];
    }
}
