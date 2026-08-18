<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->first();
        
        if (!$profile) {
            return response()->json(['data' => null]);
        }

        return response()->json([
            'data' => [
                'name' => $profile->user->name,
                'title' => $profile->title,
                'bio' => $profile->bio,
                'short_bio' => $profile->short_bio,
                'location' => $profile->location,
                'email' => $profile->email,
                'phone' => $profile->phone,
                'career_objective' => $profile->career_objective,
                'developer_journey' => $profile->developer_journey,
                'current_focus' => $profile->current_focus,
                'personal_statement' => $profile->personal_statement,
            ]
        ]);
    }
}
