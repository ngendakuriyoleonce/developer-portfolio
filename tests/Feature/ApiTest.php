<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_profile_endpoint(): void
    {
        $response = $this->getJson('/api/profile');
        // Returns 200 with data or 404 if no profile exists
        $response->assertStatus(200);
    }

    public function test_api_skills_endpoint(): void
    {
        $response = $this->getJson('/api/skills');
        $response->assertSuccessful();
    }

    public function test_api_projects_endpoint(): void
    {
        $response = $this->getJson('/api/projects');
        $response->assertSuccessful();
    }

    public function test_api_experiences_endpoint(): void
    {
        $response = $this->getJson('/api/experiences');
        $response->assertSuccessful();
    }

    public function test_api_education_endpoint(): void
    {
        $response = $this->getJson('/api/education');
        $response->assertSuccessful();
    }

    public function test_api_services_endpoint(): void
    {
        $response = $this->getJson('/api/services');
        $response->assertSuccessful();
    }
}
