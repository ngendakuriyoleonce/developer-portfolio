<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Service;
use App\Models\ContactMessage;
use App\Models\SocialLink;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'experience' => Experience::count(),
            'messages' => ContactMessage::count(),
            'certifications' => Certification::count(),
            'educations' => Education::count(),
            'services' => Service::count(),
            'social_links' => SocialLink::count(),
        ];

        $recentProjects = Project::orderBy('created_at', 'desc')->take(5)->get();
        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentMessages', 'unreadMessages'));
    }
}
