<?php

namespace Database\Seeders;

use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class SkillCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Backend', 'slug' => 'backend', 'icon' => 'server', 'order_column' => 1],
            ['name' => 'Frontend', 'slug' => 'frontend', 'icon' => 'palette', 'order_column' => 2],
            ['name' => 'Database', 'slug' => 'database', 'icon' => 'database', 'order_column' => 3],
            ['name' => 'DevOps / Infrastructure', 'slug' => 'devops', 'icon' => 'cloud', 'order_column' => 4],
        ];

        foreach ($categories as $category) {
            SkillCategory::create($category);
        }
    }
}
