<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::create([
            'institution' => 'Carnegie Mellon University Africa',
            'degree' => 'Bachelor of Science',
            'field_of_study' => 'Computer Science',
            'description' => 'Studied computer science fundamentals including algorithms, data structures, software engineering, and web development.',
            'start_date' => '2021-09-01',
            'end_date' => '2025-06-30',
            'is_current' => false,
            'order_column' => 1,
        ]);

        Education::create([
            'institution' => 'Online Learning Platforms',
            'degree' => 'Professional Certificates',
            'field_of_study' => 'Web Development',
            'description' => 'Completed various courses on Laravel, PHP, and modern web development practices through Udemy, Laracasts, and other platforms.',
            'start_date' => '2022-01-01',
            'end_date' => null,
            'is_current' => true,
            'order_column' => 2,
        ]);
    }
}
