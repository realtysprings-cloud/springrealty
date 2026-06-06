<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('images');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $properties = $query->latest()->paginate(10)->withQueryString();

        return view('admin.pages.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.pages.properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'property_type' => 'required|in:house,apartment,condo,land',
            'status' => 'required|in:for_sale,for_rent,sold',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|numeric|min:0',
            'square_feet' => 'nullable|integer|min:0',
            'year_built' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'featured' => 'boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $validated['featured'] = $request->boolean('featured');

        $property = Property::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('properties', 'public');
                $property->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        $property->load('images');
        return view('admin.pages.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'property_type' => 'required|in:house,apartment,condo,land',
            'status' => 'required|in:for_sale,for_rent,sold',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|numeric|min:0',
            'square_feet' => 'nullable|integer|min:0',
            'year_built' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'featured' => 'boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'integer|exists:property_images,id',
        ]);

        $validated['featured'] = $request->boolean('featured');
        $property->update($validated);

        // Remove selected images
        if ($request->filled('remove_images')) {
            foreach ($request->remove_images as $imageId) {
                $image = PropertyImage::find($imageId);
                if ($image && $image->property_id === $property->id) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }
            }
        }

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('properties', 'public');
                $property->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete associated images from storage
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}
