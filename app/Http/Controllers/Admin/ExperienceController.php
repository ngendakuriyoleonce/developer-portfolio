<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order_column')->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'technologies' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'is_published' => 'boolean',
            'order_column' => 'nullable|integer|min:0',
        ]);

        $validated['responsibilities'] = $validated['responsibilities'] ? array_map('trim', explode("\n", $validated['responsibilities'])) : null;
        $validated['technologies'] = $validated['technologies'] ? array_map('trim', explode(',', $validated['technologies'])) : null;

        Experience::create($validated);

        return redirect()->route('admin.experience.index')->with('success', 'Experience created successfully!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'technologies' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'is_published' => 'boolean',
            'order_column' => 'nullable|integer|min:0',
        ]);

        $validated['responsibilities'] = $validated['responsibilities'] ? array_map('trim', explode("\n", $validated['responsibilities'])) : null;
        $validated['technologies'] = $validated['technologies'] ? array_map('trim', explode(',', $validated['technologies'])) : null;

        $experience->update($validated);

        return redirect()->route('admin.experience.index')->with('success', 'Experience updated successfully!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('success', 'Experience deleted successfully!');
    }
}
