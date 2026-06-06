<?php

namespace App\Http\Controllers\RealEstate;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured properties only
        $properties = Property::where('featured', true)
            ->with('images')
            ->orderBy('price', 'asc')
            ->take(6)
            ->get();

        return view('realestate.pages.home', compact('properties'));
    }
}
