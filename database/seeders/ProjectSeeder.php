<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Smart Office Suite',
            'slug' => 'smart-office-suite',
            'short_description' => 'Enterprise Office Management System built with Laravel 13.',
            'full_description' => "A comprehensive enterprise office management system built with Laravel 13, focusing on clean code, security, and user experience. Features robust RESTful APIs, dynamic Filament admin panels, secure Sanctum authentication, and granular role-based access control.",
            'problem' => 'Organizations needed a comprehensive enterprise system to manage office operations securely and efficiently.',
            'solution' => 'Built an enterprise system with a clean MVC structure, robust RESTful APIs, Filament admin dashboards, SECURE authentication with Sanctum, and RBAC using Spatie Permission.',
            'features' => ['RESTful APIs', 'Filament Admin Panels', 'Sanctum Authentication', 'Role-Based Access Control', 'Custom Dashboards & Widgets', 'Eloquent ORM'],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Filament', 'Sanctum', 'Spatie Permission', 'Blade', 'Tailwind CSS'],
            'github_url' => 'https://github.com/ngendakuriyoleonce/smart-office-suite',
            'live_demo_url' => null,
            'start_date' => '2024-01-01',
            'completion_date' => null,
            'is_featured' => true,
            'is_published' => true,
            'order_column' => 1,
        ]);

        Project::create([
            'title' => 'HR Management System',
            'slug' => 'hr-management-system',
            'short_description' => 'Human Resource Management Platform built to streamline employee and project management.',
            'full_description' => "A full-featured HR platform built with Laravel 13 to streamline employee and project management. Features a modular back-end with a suite of APIs for managing employee records, leave workflows, attendance, and timesheets.",
            'problem' => 'HR teams needed a platform to efficiently manage employee records, leave workflows, attendance, and timesheets.',
            'solution' => 'Built a modular Laravel back-end with APIs for employee management, a dynamic Blade and Alpine.js front-end, and a powerful Filament admin dashboard.',
            'features' => ['Employee Records', 'Leave Workflows', 'Attendance Tracking', 'Timesheets', 'Project Assignment', 'Filament Admin Dashboard'],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Alpine.js', 'Filament', 'Eloquent'],
            'github_url' => 'https://github.com/ngendakuriyoleonce/hr-management-system',
            'live_demo_url' => null,
            'start_date' => '2023-06-01',
            'completion_date' => '2023-12-31',
            'is_featured' => true,
            'is_published' => true,
            'order_column' => 2,
        ]);

        Project::create([
            'title' => 'Leonce Blog',
            'slug' => 'leonce-blog',
            'short_description' => 'Content Management System for Blog Articles with a focus on performance.',
            'full_description' => "A custom blog platform built with Laravel 13 with a focus on performance and user engagement. Manages posts, categories, user comments, and a search feature with a responsive Blade front-end.",
            'problem' => 'Needed a custom, performant blogging platform to manage posts, categories, user comments, and search.',
            'solution' => 'Built a complete blogging system from the ground up using Laravel 13 with Blade templating, Laravel Breeze authentication, and an efficient search and filter system.',
            'features' => ['Post Management', 'Categories', 'User Comments', 'Search & Filter', 'Laravel Breeze Auth', 'User Profiles'],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Laravel Breeze', 'Eloquent'],
            'github_url' => 'https://github.com/ngendakuriyoleonce/leonce-blog',
            'live_demo_url' => null,
            'start_date' => '2023-01-01',
            'completion_date' => '2023-05-31',
            'is_featured' => true,
            'is_published' => true,
            'order_column' => 3,
        ]);

        Project::create([
            'title' => 'E-Commerce Management System',
            'slug' => 'e-commerce-management-system',
            'short_description' => 'Online Shopping Platform with a focus on user experience and data management.',
            'full_description' => "A modern e-commerce platform built with Laravel 13 with a focus on user experience and data management. Features product and category management, customer carts, checkout flow, order processing, and PDF invoice generation.",
            'problem' => 'Store owners needed a modern e-commerce platform to sell products online with smooth checkout and order processing.',
            'solution' => 'Built a modern e-commerce platform with Blade, Tailwind CSS, and JavaScript, PDF invoice generation with DomPDF, and a comprehensive Filament admin dashboard.',
            'features' => ['Product & Category Management', 'Customer Carts', 'Checkout Flow', 'Order Processing', 'PDF Invoices', 'Filament Admin Dashboard'],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'Tailwind CSS', 'JavaScript', 'Eloquent', 'DomPDF', 'Filament'],
            'github_url' => 'https://github.com/ngendakuriyoleonce/e-commerce-management-system',
            'live_demo_url' => null,
            'start_date' => '2022-01-01',
            'completion_date' => '2022-12-31',
            'is_featured' => false,
            'is_published' => true,
            'order_column' => 4,
        ]);
    }
}
