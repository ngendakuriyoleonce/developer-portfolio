<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate(['user_id' => auth()->id()]);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'short_bio' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:255',
            'career_objective' => 'nullable|string',
            'developer_journey' => 'nullable|string',
            'current_focus' => 'nullable|string',
            'personal_statement' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('profile', 'public');
        }

        $profile = Profile::firstOrCreate(['user_id' => auth()->id()]);
        $profile->update($validated);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
