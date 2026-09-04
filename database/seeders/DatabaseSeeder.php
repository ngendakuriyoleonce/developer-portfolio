<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Leonce Ngendakuriyo',
            'email' => 'admin@portfolio.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'is_admin' => true,
        ]);

        $this->call([
            RolePermissionSeeder::class,
            ProfileSeeder::class,
            SkillCategorySeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
            ProjectSeeder::class,
            ServiceSeeder::class,
            SocialLinkSeeder::class,
            ContactMessageSeeder::class,
        ]);
    }
}
