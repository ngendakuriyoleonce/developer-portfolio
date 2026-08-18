<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    private int $ttl = 3600; // 1 hour

    public function getProfile()
    {
        return Cache::remember('profile', $this->ttl, fn () => \App\Models\Profile::with('user')->first());
    }

    public function getSkills()
    {
        return Cache::remember('skills', $this->ttl, fn () => \App\Models\SkillCategory::with('skills')->orderBy('order_column')->get());
    }

    public function getProjects()
    {
        return Cache::remember('projects', $this->ttl, fn () => \App\Models\Project::where('is_published', true)->orderBy('order_column')->get());
    }

    public function getServices()
    {
        return Cache::remember('services', $this->ttl, fn () => \App\Models\Service::where('is_published', true)->orderBy('order_column')->get());
    }

    public function getExperiences()
    {
        return Cache::remember('experiences', $this->ttl, fn () => \App\Models\Experience::where('is_published', true)->orderBy('order_column')->get());
    }

    public function clearAll(): void
    {
        Cache::forget('profile');
        Cache::forget('skills');
        Cache::forget('projects');
        Cache::forget('services');
        Cache::forget('experiences');
    }
}
