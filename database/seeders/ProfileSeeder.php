<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@portfolio.com')->first();

        Profile::create([
            'user_id' => $user->id,
            'title' => 'Junior Full-Stack Laravel Developer',
            'bio' => "I'm a passionate full-stack developer specializing in Laravel and modern web technologies. With a strong foundation in PHP, MySQL, and frontend technologies, I build secure, scalable, and user-friendly web applications. My journey in software development started with curiosity and has evolved into a career dedicated to creating impactful digital solutions.\n\nI believe in writing clean, maintainable code and following best practices. Every project is an opportunity to learn something new and push the boundaries of what's possible with web technology.",
            'short_bio' => 'Building modern, secure and scalable web applications with Laravel.',
            'phone' => '+250 788 123 456',
            'email' => 'tahssin@portfolio.com',
            'location' => 'Kigali, Rwanda',
            'career_objective' => 'To contribute to innovative projects as a Junior Laravel Developer while continuously learning and growing in the field of full-stack web development.',
            'developer_journey' => "My journey began with HTML and CSS, and quickly progressed to PHP and Laravel. I've worked on various projects including e-commerce platforms, REST APIs, and portfolio websites. Each project has taught me valuable lessons about architecture, performance, and user experience.",
            'current_focus' => 'Currently focused on mastering Laravel advanced features, Redis caching, Docker containerization, and building RESTful APIs with Sanctum authentication.',
            'personal_statement' => "Code is not just syntax — it's a way to solve problems and create value. I'm committed to writing code that matters.",
        ]);
    }
}
