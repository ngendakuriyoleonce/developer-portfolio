<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Laravel Development',
                'slug' => 'laravel-development',
                'description' => 'Custom Laravel applications built with best practices, clean code, and scalable architecture.',
                'icon' => 'code',
                'features' => ['Custom Applications', 'Laravel Migration', 'Package Development', 'Performance Optimization'],
                'order_column' => 1,
            ],
            [
                'title' => 'PHP Development',
                'slug' => 'php-development',
                'description' => 'Robust PHP solutions for web applications, from simple scripts to complex enterprise systems.',
                'icon' => 'server',
                'features' => ['PHP 8.x', 'Object-Oriented Programming', 'Design Patterns', 'Legacy Code Modernization'],
                'order_column' => 2,
            ],
            [
                'title' => 'REST API Development',
                'slug' => 'rest-api-development',
                'description' => 'Scalable and well-documented RESTful APIs with authentication and rate limiting.',
                'icon' => 'globe',
                'features' => ['RESTful Design', 'Authentication', 'Documentation', 'Rate Limiting'],
                'order_column' => 3,
            ],
            [
                'title' => 'Database Development',
                'slug' => 'database-development',
                'description' => 'Database design, optimization, and management for MySQL and SQLite.',
                'icon' => 'database',
                'features' => ['Schema Design', 'Query Optimization', 'Migration', 'Backup Solutions'],
                'order_column' => 4,
            ],
            [
                'title' => 'Web Application Development',
                'slug' => 'web-application-development',
                'description' => 'Full-stack web applications with modern UI and powerful backend.',
                'icon' => 'globe',
                'features' => ['Full-Stack Development', 'Responsive Design', 'Real-time Features', 'Progressive Web Apps'],
                'order_column' => 5,
            ],
            [
                'title' => 'Website Maintenance & Support',
                'slug' => 'website-maintenance',
                'description' => 'Ongoing maintenance, updates, and support for existing web applications.',
                'icon' => 'wrench',
                'features' => ['Bug Fixes', 'Security Updates', 'Performance Monitoring', 'Feature Additions'],
                'order_column' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
