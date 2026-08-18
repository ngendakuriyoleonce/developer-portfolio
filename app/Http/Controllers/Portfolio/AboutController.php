<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Profile;

class AboutController extends Controller
{
    public function __invoke()
    {
        $profile = Profile::first();
        return view('portfolio.about', compact('profile'));
    }
}
