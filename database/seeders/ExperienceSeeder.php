<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'job_title' => 'Junior Full-Stack Developer',
            'company' => 'Tech Solutions Rwanda',
            'location' => 'Kigali, Rwanda',
            'description' => 'Developing and maintaining web applications using Laravel and modern frontend technologies.',
            'responsibilities' => ['Build and maintain Laravel applications', 'Develop RESTful APIs', 'Database design and optimization', 'Code review and testing'],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Redis', 'Docker'],
            'start_date' => '2024-01-15',
            'end_date' => null,
            'is_current' => true,
            'is_published' => true,
            'order_column' => 1,
        ]);

        Experience::create([
            'job_title' => 'Web Development Intern',
            'company' => 'Digital Agency Kigali',
            'location' => 'Kigali, Rwanda',
            'description' => 'Learned fundamentals of web development and contributed to client projects.',
            'responsibilities' => ['Assisted in building client websites', 'Learned Laravel framework', 'Participated in agile development process'],
            'technologies' => ['PHP', 'Laravel', 'HTML', 'CSS', 'JavaScript', 'MySQL'],
            'start_date' => '2023-06-01',
            'end_date' => '2023-12-31',
            'is_current' => false,
            'is_published' => true,
            'order_column' => 2,
        ]);

        Experience::create([
            'job_title' => 'Freelance Web Developer',
            'company' => 'Self-Employed',
            'location' => 'Remote',
            'description' => 'Building custom web solutions for local businesses and startups.',
            'responsibilities' => ['Full-stack web development', 'Client communication and requirements gathering', 'Project management'],
            'technologies' => ['Laravel', 'PHP', 'MySQL', 'WordPress'],
            'start_date' => '2023-01-01',
            'end_date' => '2023-05-31',
            'is_current' => false,
            'is_published' => true,
            'order_column' => 3,
        ]);
    }
}
