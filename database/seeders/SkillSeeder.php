<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $backend = SkillCategory::where('slug', 'backend')->first();
        $frontend = SkillCategory::where('slug', 'frontend')->first();
        $database = SkillCategory::where('slug', 'database')->first();
        $devops = SkillCategory::where('slug', 'devops')->first();

        $skills = [
            // Backend
            ['skill_category_id' => $backend->id, 'name' => 'PHP', 'slug' => 'php', 'proficiency' => 90, 'order_column' => 1],
            ['skill_category_id' => $backend->id, 'name' => 'Laravel', 'slug' => 'laravel', 'proficiency' => 85, 'order_column' => 2],
            ['skill_category_id' => $backend->id, 'name' => 'REST API', 'slug' => 'rest-api', 'proficiency' => 80, 'order_column' => 3],
            ['skill_category_id' => $backend->id, 'name' => 'Sanctum', 'slug' => 'sanctum', 'proficiency' => 75, 'order_column' => 4],
            ['skill_category_id' => $backend->id, 'name' => 'Eloquent ORM', 'slug' => 'eloquent', 'proficiency' => 85, 'order_column' => 5],

            // Frontend
            ['skill_category_id' => $frontend->id, 'name' => 'HTML', 'slug' => 'html', 'proficiency' => 95, 'order_column' => 1],
            ['skill_category_id' => $frontend->id, 'name' => 'CSS', 'slug' => 'css', 'proficiency' => 90, 'order_column' => 2],
            ['skill_category_id' => $frontend->id, 'name' => 'JavaScript', 'slug' => 'javascript', 'proficiency' => 75, 'order_column' => 3],
            ['skill_category_id' => $frontend->id, 'name' => 'Tailwind CSS', 'slug' => 'tailwind', 'proficiency' => 85, 'order_column' => 4],
            ['skill_category_id' => $frontend->id, 'name' => 'Alpine.js', 'slug' => 'alpinejs', 'proficiency' => 70, 'order_column' => 5],
            ['skill_category_id' => $frontend->id, 'name' => 'Blade', 'slug' => 'blade', 'proficiency' => 90, 'order_column' => 6],
            ['skill_category_id' => $frontend->id, 'name' => 'Vite', 'slug' => 'vite', 'proficiency' => 75, 'order_column' => 7],

            // Database
            ['skill_category_id' => $database->id, 'name' => 'MySQL', 'slug' => 'mysql', 'proficiency' => 80, 'order_column' => 1],
            ['skill_category_id' => $database->id, 'name' => 'SQLite', 'slug' => 'sqlite', 'proficiency' => 70, 'order_column' => 2],

            // DevOps
            ['skill_category_id' => $devops->id, 'name' => 'Redis', 'slug' => 'redis', 'proficiency' => 70, 'order_column' => 1],
            ['skill_category_id' => $devops->id, 'name' => 'Docker', 'slug' => 'docker', 'proficiency' => 65, 'order_column' => 2],
            ['skill_category_id' => $devops->id, 'name' => 'Nginx', 'slug' => 'nginx', 'proficiency' => 60, 'order_column' => 3],
            ['skill_category_id' => $devops->id, 'name' => 'Linux', 'slug' => 'linux', 'proficiency' => 70, 'order_column' => 4],
            ['skill_category_id' => $devops->id, 'name' => 'Git', 'slug' => 'git', 'proficiency' => 85, 'order_column' => 5],
            ['skill_category_id' => $devops->id, 'name' => 'GitHub', 'slug' => 'github', 'proficiency' => 85, 'order_column' => 6],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
