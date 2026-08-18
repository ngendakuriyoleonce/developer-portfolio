<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Certification;

class CertificationController extends Controller
{
    public function __invoke()
    {
        $certifications = Certification::where('is_published', true)->orderBy('order_column')->get();
        return view('portfolio.certifications', compact('certifications'));
    }
}
