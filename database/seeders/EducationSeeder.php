<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::create([
            'institution' => 'University of the Great Lakes (UGL)',
            'degree' => 'Bachelor of Management Information Systems',
            'field_of_study' => 'Management Information Systems',
            'description' => 'Studied management information systems, gaining a strong foundation in information technology, business management, and software development.',
            'start_date' => '2019-09-01',
            'end_date' => '2023-06-30',
            'is_current' => false,
            'order_column' => 1,
        ]);
    }
}
