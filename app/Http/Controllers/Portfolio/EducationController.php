<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Education;

class EducationController extends Controller
{
    public function __invoke()
    {
        $educations = Education::orderBy('order_column')->get();
        return view('portfolio.education', compact('educations'));
    }
}
