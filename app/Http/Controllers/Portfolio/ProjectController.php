<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_published', true)->orderBy('order_column')->get();
        return view('portfolio.projects', compact('projects'));
    }

    public function show(Project $project)
    {
        if (!$project->is_published) {
            abort(404);
        }
        $project->load('images');
        $relatedProjects = Project::where('is_published', true)
            ->where('id', '!=', $project->id)
            ->orderBy('order_column')
            ->take(3)
            ->get();

        return view('portfolio.project-detail', compact('project', 'relatedProjects'));
    }
}
