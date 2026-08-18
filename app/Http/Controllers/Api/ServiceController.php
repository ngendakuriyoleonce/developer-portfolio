<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_published', true)
            ->orderBy('order_column')
            ->get();

        return response()->json(['data' => $services]);
    }
}
