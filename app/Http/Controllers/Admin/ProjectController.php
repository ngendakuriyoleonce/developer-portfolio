<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order_column')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'features' => 'nullable|string',
            'technologies' => 'nullable|string',
            'github_url' => 'nullable|url|max:255',
            'live_demo_url' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date|after_or_equal:start_date',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order_column' => 'nullable|integer|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['features'] = $validated['features'] ? array_map('trim', explode("\n", $validated['features'])) : null;
        $validated['technologies'] = $validated['technologies'] ? array_map('trim', explode(',', $validated['technologies'])) : null;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'features' => 'nullable|string',
            'technologies' => 'nullable|string',
            'github_url' => 'nullable|url|max:255',
            'live_demo_url' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date|after_or_equal:start_date',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order_column' => 'nullable|integer|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['features'] = $validated['features'] ? array_map('trim', explode("\n", $validated['features'])) : null;
        $validated['technologies'] = $validated['technologies'] ? array_map('trim', explode(',', $validated['technologies'])) : null;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
