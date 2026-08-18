<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Project;

class ResumeController extends Controller
{
    public function __invoke()
    {
        $profile = Profile::first();
        $skillCategories = SkillCategory::with('skills')->orderBy('order_column')->get();
        $experiences = Experience::where('is_published', true)->orderBy('order_column')->get();
        $educations = Education::orderBy('order_column')->get();
        $certifications = Certification::where('is_published', true)->orderBy('order_column')->get();
        $projects = Project::where('is_published', true)->where('is_featured', true)->orderBy('order_column')->get();

        return view('portfolio.resume', compact('profile', 'skillCategories', 'experiences', 'educations', 'certifications', 'projects'));
    }
}
