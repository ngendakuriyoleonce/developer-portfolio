<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'job_title' => 'Full-Stack Developer',
            'company' => 'Smart Office Suite',
            'location' => 'Remote',
            'description' => 'Enterprise Office Management System built with Laravel 13, focusing on clean code, security, and user experience.',
            'responsibilities' => [
                'Architected and built the back-end using Laravel 13, implementing a clean MVC structure and robust RESTful APIs',
                'Developed dynamic and responsive admin panels using Filament, creating custom dashboards and widgets for data visualization',
                'Engineered a secure authentication system using Laravel Sanctum, managing user sessions and API tokens for secure front-end communication',
                'Implemented a granular Role-Based Access Control (RBAC) system using Spatie Permission to manage user permissions across different modules',
                'Designed and optimized complex relational database schemas, utilizing Eloquent ORM for efficient data retrieval and management',
                'Applied Blade Templating and Tailwind CSS to build a consistent and modern user interface for the employee portal',
            ],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Filament', 'Sanctum', 'Spatie Permission', 'Blade', 'Tailwind CSS'],
            'start_date' => '2024-01-01',
            'end_date' => null,
            'is_current' => true,
            'is_published' => true,
            'order_column' => 1,
        ]);

        Experience::create([
            'job_title' => 'Full-Stack Developer',
            'company' => 'HR Management System',
            'location' => 'Remote',
            'description' => 'Human Resource Management Platform built to streamline employee and project management.',
            'responsibilities' => [
                'Designed a modular back-end with Laravel 13, creating a suite of APIs for managing employee records, leave workflows, attendance, and timesheets',
                'Developed a dynamic and user-friendly front-end using Blade and Alpine.js, ensuring a seamless experience for HR personnel and employees',
                'Integrated Filament for a powerful and customizable admin dashboard, enabling efficient data monitoring and reporting',
                'Implemented complex business logic for leave request workflows and project assignment using Laravel\'s Eloquent relationships',
            ],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Alpine.js', 'Filament', 'Eloquent'],
            'start_date' => '2023-06-01',
            'end_date' => '2023-12-31',
            'is_current' => false,
            'is_published' => true,
            'order_column' => 2,
        ]);

        Experience::create([
            'job_title' => 'Full-Stack Developer',
            'company' => 'Leonce Blog',
            'location' => 'Remote',
            'description' => 'Content Management System for Blog Articles with a focus on performance and user engagement.',
            'responsibilities' => [
                'Built a complete blogging system from the ground up using Laravel 13, managing posts, categories, user comments, and a search feature',
                'Applied Blade Templating to create a responsive and visually appealing front-end, ensuring a great user experience on all devices',
                'Integrated Laravel Breeze for simple, secure user authentication, allowing for user profiles and comment management',
                'Implemented a search and filter system for content discovery, utilizing efficient Eloquent queries for optimal performance',
            ],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Laravel Breeze', 'Eloquent'],
            'start_date' => '2023-01-01',
            'end_date' => '2023-05-31',
            'is_current' => false,
            'is_published' => true,
            'order_column' => 3,
        ]);

        Experience::create([
            'job_title' => 'Full-Stack Developer',
            'company' => 'E-Commerce Management System',
            'location' => 'Remote',
            'description' => 'Online Shopping Platform built with a focus on user experience and data management.',
            'responsibilities' => [
                'Designed and implemented the core e-commerce functionality, including product/category management, customer carts, checkout flow, and order processing',
                'Developed the customer-facing interface with Blade, Tailwind CSS, and JavaScript, creating a smooth and interactive shopping experience',
                'Managed and structured complex data relationships between products, orders, and customers using Eloquent ORM',
                'Implemented PDF invoice generation using DomPDF for order confirmations, providing a professional and automated system',
                'Created a comprehensive admin dashboard with Filament, enabling store owners to easily manage inventory, orders, and customer data',
            ],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Tailwind CSS', 'JavaScript', 'Eloquent', 'DomPDF', 'Filament'],
            'start_date' => '2022-01-01',
            'end_date' => '2022-12-31',
            'is_current' => false,
            'is_published' => true,
            'order_column' => 4,
        ]);
    }
}
