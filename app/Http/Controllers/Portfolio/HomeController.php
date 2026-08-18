<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\Service;
use App\Models\Experience;

class HomeController extends Controller
{
    public function __invoke()
    {
        $profile = Profile::first();
        $featuredProjects = Project::where('is_featured', true)->where('is_published', true)->orderBy('order_column')->take(3)->get();
        $skillCategories = SkillCategory::with('skills')->orderBy('order_column')->get();
        $services = Service::where('is_published', true)->orderBy('order_column')->get();
        $recentExperience = Experience::where('is_published', true)->orderBy('order_column')->first();

        return view('portfolio.home', compact('profile', 'featuredProjects', 'skillCategories', 'services', 'recentExperience'));
    }
}
