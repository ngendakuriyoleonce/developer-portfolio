<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        ContactMessage::create([
            'name' => 'Jean Mutoni',
            'email' => 'jean@example.com',
            'subject' => 'Job Opportunity',
            'message' => 'Hi Tahssin, I saw your portfolio and I am impressed with your Laravel skills. Would you be interested in a junior developer position at our company?',
            'is_read' => false,
        ]);

        ContactMessage::create([
            'name' => 'Alice Uwimana',
            'email' => 'alice@example.com',
            'subject' => 'Project Collaboration',
            'message' => 'Hello! I am working on a startup and need a Laravel developer. Can we discuss a potential collaboration?',
            'is_read' => true,
            'read_at' => now()->subDays(2),
        ]);

        ContactMessage::create([
            'name' => 'Bob Niyonzima',
            'email' => 'bob@example.com',
            'subject' => 'Freelance Work',
            'message' => 'Hey, I need a simple Laravel API for my mobile app. What are your rates?',
            'is_read' => false,
        ]);
    }
}
