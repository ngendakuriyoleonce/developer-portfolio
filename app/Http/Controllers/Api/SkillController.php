<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;

class SkillController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::with('skills')->orderBy('order_column')->get();

        return response()->json(['data' => $categories]);
    }
}
