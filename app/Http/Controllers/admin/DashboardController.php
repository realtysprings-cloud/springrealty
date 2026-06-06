<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_properties' => Property::count(),
            'for_sale' => Property::where('status', 'for_sale')->count(),
            'for_rent' => Property::where('status', 'for_rent')->count(),
            'featured' => Property::where('featured', true)->count(),
        ];

        $recentProperties = Property::with('images')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.pages.dashboard', compact('stats', 'recentProperties'));
    }
}
