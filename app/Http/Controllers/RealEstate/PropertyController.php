<?php

namespace App\Http\Controllers\RealEstate;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('images');

        if ($request->filled('type')) {
            $query->where('property_type', $request->type);
        }

        if ($request->filled('unit_type')) {
            $query->where('unit_type', $request->unit_type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $properties = $query->latest()->paginate(9)->withQueryString();

        return view('realestate.pages.properties', compact('properties'));
    }

    public function show(Property $property)
    {
        $property->load('images');

        $relatedProperties = Property::with('images')
            ->where('id', '!=', $property->id)
            ->where('property_type', $property->property_type)
            ->latest()
            ->take(3)
            ->get();

        return view('realestate.pages.property-show', compact('property', 'relatedProperties'));
    }
}
