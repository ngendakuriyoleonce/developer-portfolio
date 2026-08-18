<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::where('is_published', true)
            ->orderBy('order_column')
            ->get();

        return response()->json(['data' => $experiences]);
    }
}
