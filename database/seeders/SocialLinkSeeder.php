<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        SocialLink::create(['platform' => 'github', 'url' => 'https://github.com/ngendakuriyoleonce', 'icon' => 'github', 'is_active' => true, 'order_column' => 1]);
        SocialLink::create(['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/leonce-ngendakuriyo', 'icon' => 'linkedin', 'is_active' => true, 'order_column' => 2]);
    }
}
