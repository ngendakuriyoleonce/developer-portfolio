<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'E-Commerce Platform',
            'slug' => 'e-commerce-platform',
            'short_description' => 'A full-featured e-commerce platform built with Laravel.',
            'full_description' => "A comprehensive e-commerce solution featuring product management, shopping cart, payment processing, and order tracking. Built with Laravel 13, MySQL, and modern frontend technologies.",
            'problem' => 'Local businesses needed an affordable and customizable e-commerce solution to sell their products online.',
            'solution' => 'Built a complete Laravel-based e-commerce platform with product management, cart system, payment integration, and admin dashboard.',
            'features' => ['User Authentication', 'Product Management', 'Shopping Cart', 'Payment Integration', 'Order Tracking', 'Admin Dashboard', 'REST API'],
            'technologies' => ['Laravel', 'MySQL', 'Stripe', 'Tailwind CSS', 'Alpine.js', 'Redis', 'Docker'],
            'github_url' => 'https://github.com/tahssin/e-commerce-platform',
            'live_demo_url' => 'https://demo-ecommerce.tahssin.dev',
            'start_date' => '2024-06-01',
            'completion_date' => '2024-12-15',
            'is_featured' => true,
            'is_published' => true,
            'order_column' => 1,
        ]);

        Project::create([
            'title' => 'Task Management API',
            'slug' => 'task-management-api',
            'short_description' => 'RESTful API for task and project management.',
            'full_description' => "A RESTful API built with Laravel and Sanctum for task and project management. Features team collaboration, task assignments, and real-time updates.",
            'problem' => 'Teams needed a simple yet powerful API to manage tasks and projects programmatically.',
            'solution' => 'Created a RESTful API with Laravel Sanctum authentication, comprehensive endpoints, and documentation.',
            'features' => ['Sanctum Authentication', 'CRUD Operations', 'Team Management', 'Task Assignments', 'API Documentation', 'Rate Limiting'],
            'technologies' => ['Laravel', 'Sanctum', 'MySQL', 'Redis', 'Swagger'],
            'github_url' => 'https://github.com/tahssin/task-management-api',
            'start_date' => '2024-09-01',
            'completion_date' => '2025-01-30',
            'is_featured' => true,
            'is_published' => true,
            'order_column' => 2,
        ]);

        Project::create([
            'title' => 'Portfolio Website',
            'slug' => 'portfolio-website',
            'short_description' => 'Personal developer portfolio built with Laravel.',
            'full_description' => "This very portfolio website! Built with Laravel 13, featuring an admin dashboard, Redis caching, Docker support, and more.",
            'problem' => 'Needed a professional way to showcase skills, projects, and experience to potential employers.',
            'solution' => 'Built a comprehensive portfolio with admin dashboard, REST API, Redis caching, and Docker containerization.',
            'features' => ['Admin Dashboard', 'Dynamic Content', 'Redis Caching', 'REST API', 'PDF CV Generation', 'Contact Form', 'Docker Support'],
            'technologies' => ['Laravel', 'MySQL', 'Redis', 'Docker', 'Tailwind CSS', 'Alpine.js', 'Nginx'],
            'github_url' => 'https://github.com/tahssin/developer-portfolio',
            'start_date' => '2025-01-01',
            'completion_date' => null,
            'is_featured' => true,
            'is_published' => true,
            'order_column' => 3,
        ]);

        Project::create([
            'title' => 'Blog CMS',
            'slug' => 'blog-cms',
            'short_description' => 'A content management system for blogging.',
            'full_description' => 'A lightweight CMS for managing blog posts with categories, tags, and SEO optimization.',
            'problem' => 'Wanted a simple, fast CMS for technical blogging without the bloat of WordPress.',
            'solution' => 'Created a custom Laravel CMS with markdown support, categories, tags, and SEO tools.',
            'features' => ['Markdown Editor', 'Categories & Tags', 'SEO Optimization', 'Image Upload', 'Draft System'],
            'technologies' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Pint'],
            'github_url' => 'https://github.com/tahssin/blog-cms',
            'start_date' => '2024-03-01',
            'completion_date' => '2024-07-30',
            'is_featured' => false,
            'is_published' => true,
            'order_column' => 4,
        ]);
    }
}
