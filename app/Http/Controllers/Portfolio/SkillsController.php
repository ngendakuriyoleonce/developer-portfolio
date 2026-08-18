<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;

class SkillsController extends Controller
{
    public function __invoke()
    {
        $categories = SkillCategory::with('skills')->orderBy('order_column')->get();
        return view('portfolio.skills', compact('categories'));
    }
}
