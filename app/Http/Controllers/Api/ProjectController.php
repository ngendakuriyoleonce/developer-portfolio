<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_published', true)
            ->orderBy('order_column')
            ->get(['id', 'title', 'slug', 'short_description', 'technologies', 'github_url', 'live_demo_url', 'is_featured', 'created_at']);

        return response()->json(['data' => $projects]);
    }

    public function show(Project $project)
    {
        if (!$project->is_published) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->load('images');

        return response()->json(['data' => $project]);
    }
}
