<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function __invoke()
    {
        $experiences = Experience::where('is_published', true)->orderBy('order_column')->get();
        return view('portfolio.experience', compact('experiences'));
    }
}
