<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        Profile::create([
            'user_id' => $user->id,
            'title' => 'Full-Stack Developer',
            'bio' => 'Test bio',
            'short_bio' => 'Test short bio',
            'location' => 'Kigali, Rwanda',
            'email' => 'test@test.com',
        ]);
    }

    public function test_home_page_loads(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_about_page_loads(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_skills_page_loads(): void
    {
        $response = $this->get('/skills');
        $response->assertStatus(200);
    }

    public function test_projects_page_loads(): void
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);
    }

    public function test_services_page_loads(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
    }

    public function test_contact_page_loads(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_experience_page_loads(): void
    {
        $response = $this->get('/experience');
        $response->assertStatus(200);
    }

    public function test_education_page_loads(): void
    {
        $response = $this->get('/education');
        $response->assertStatus(200);
    }

    public function test_resume_page_loads(): void
    {
        $response = $this->get('/resume');
        $response->assertStatus(200);
    }
}
