<?php

namespace Tests\Feature;

use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['is_admin' => true]);
    }

    public function test_admin_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_skill(): void
    {
        $category = SkillCategory::create(['name' => 'Backend', 'slug' => 'backend', 'order_column' => 1]);

        $response = $this->actingAs($this->admin)->post('/admin/skills', [
            'skill_category_id' => $category->id,
            'name' => 'Laravel',
            'proficiency' => 85,
            'order_column' => 1,
            'is_active' => true,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('skills', ['name' => 'Laravel']);
    }

    public function test_admin_can_delete_skill(): void
    {
        $category = SkillCategory::create(['name' => 'Backend', 'slug' => 'backend', 'order_column' => 1]);
        $skill = Skill::create(['skill_category_id' => $category->id, 'name' => 'PHP', 'slug' => 'php', 'proficiency' => 90, 'order_column' => 1]);

        $response = $this->actingAs($this->admin)->delete("/admin/skills/{$skill->id}");
        $response->assertRedirect();
        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }
}
