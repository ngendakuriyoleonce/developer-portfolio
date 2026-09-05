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
            'title' => 'Full-Stack Web Developer',
            'bio' => "I'm a Full-Stack Laravel Developer with experience building secure, scalable, and maintainable web applications using Laravel, PHP, MySQL, and modern web technologies. I'm skilled in RESTful API development, authentication, role-based access control, database design, and admin panel development with Filament. Currently expanding my expertise in Redis, Linux server administration, and VPS deployment to build production-ready applications following modern DevOps practices.",
            'short_bio' => 'Building secure, scalable and maintainable web applications with Laravel.',
            'phone' => '+971 54 564 9732',
            'email' => 'ngendakuriyoleonce@gmail.com',
            'location' => 'Umm Al Quwain, United Arab Emirates',
            'career_objective' => 'To contribute to innovative projects as a Full-Stack Laravel Developer while continuously learning and growing in the field of full-stack web development and DevOps.',
            'developer_journey' => "My journey began with HTML and CSS, and quickly progressed to PHP and Laravel. I've worked on various projects including enterprise office management systems, HR platforms, e-commerce platforms, and blogging systems. Each project has taught me valuable lessons about architecture, performance, and user experience.",
            'current_focus' => 'Currently focused on mastering Laravel advanced features, Redis caching, Linux server administration, VPS deployment, and building RESTful APIs with Sanctum authentication.',
            'personal_statement' => "Code is not just syntax — it's a way to solve problems and create value. I'm committed to writing clean, maintainable code that matters.",
        ]);
    }
}
