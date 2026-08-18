<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke()
    {
        $profile = Profile::first();
        return view('portfolio.contact', compact('profile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
