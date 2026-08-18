<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function __invoke()
    {
        $services = Service::where('is_published', true)->orderBy('order_column')->get();
        return view('portfolio.services', compact('services'));
    }
}
