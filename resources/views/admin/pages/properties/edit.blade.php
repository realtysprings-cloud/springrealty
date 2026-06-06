@extends('admin.layout.admin')

@section('title', 'Edit: ' . $property->title)
@section('page-title', 'Edit Property')

@section('content')
    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.properties.update', $property) }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            {{-- Basic Info --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Basic Information</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Title</label>
                        <input type="text" name="title" value="{{ old('title', $property->title) }}" required
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 resize-none">{{ old('description', $property->description) }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Property Type</label>
                            <select name="property_type" required class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                                @foreach(['house', 'apartment', 'condo', 'land'] as $type)
                                    <option value="{{ $type }}" {{ old('property_type', $property->property_type) == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Status</label>
                            <select name="status" required class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                                @foreach(['for_sale' => 'For Sale', 'for_rent' => 'For Rent', 'sold' => 'Sold'] as $value => $label)
                                    <option value="{{ $value }}" {{ old('status', $property->status) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="featured" value="1" {{ old('featured', $property->featured) ? 'checked' : '' }} id="featured" class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/10">
                        <label for="featured" class="text-sm font-medium text-slate-600">Featured property</label>
                    </div>
                </div>
            </div>

            {{-- Price & Location --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Price & Location</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Price (KES)</label>
                        <input type="number" name="price" value="{{ old('price', $property->price) }}" required min="0" step="100"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Address</label>
                        <input type="text" name="address" value="{{ old('address', $property->address) }}" required
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">City</label>
                            <input type="text" name="city" value="{{ old('city', $property->city) }}" required
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">State</label>
                            <input type="text" name="state" value="{{ old('state', $property->state) }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Zip Code</label>
                            <input type="text" name="zip_code" value="{{ old('zip_code', $property->zip_code) }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Details --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Property Details</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Bedrooms</label>
                        <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" min="0"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" min="0" step="0.5"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Sq Ft</label>
                        <input type="number" name="square_feet" value="{{ old('square_feet', $property->square_feet) }}" min="0"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Year Built</label>
                        <input type="number" name="year_built" value="{{ old('year_built', $property->year_built) }}" min="1900" max="{{ date('Y') + 1 }}"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                    </div>
                </div>
            </div>

            {{-- Current Images --}}
            @if($property->images->count() > 0)
                <div class="bg-white rounded-3xl border border-slate-100 p-6">
                    <h3 class="text-lg font-bold mb-5">Current Images</h3>
                    <p class="text-sm text-slate-500 mb-4">Check the box to remove an image.</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($property->images as $image)
                            <div class="relative group">
                                <div class="aspect-square rounded-2xl overflow-hidden bg-slate-100">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="w-full h-full object-cover">
                                </div>
                                <label class="absolute top-2 right-2 flex items-center gap-1.5 bg-white/90 backdrop-blur rounded-full px-2.5 py-1 cursor-pointer shadow-sm">
                                    <input type="checkbox" name="remove_images[]" value="{{ $image->id }}" class="w-3.5 h-3.5 rounded border-slate-300 text-red-600 focus:ring-red-500/10">
                                    <span class="text-xs font-medium text-red-600">Remove</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Add new images --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Add New Images</h3>
                <input type="file" name="images[]" multiple accept="image/*"
                       class="w-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl px-5 py-8 text-sm text-center text-slate-400 hover:border-slate-400 transition-colors cursor-pointer">
                <p class="text-xs text-slate-400 mt-2">JPG, PNG or WebP. Max 5MB each.</p>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="bg-slate-900 text-white px-8 py-3 rounded-full font-semibold hover:bg-slate-800 transition-colors">
                    Update Property
                </button>
                <a href="{{ route('admin.properties.index') }}" class="text-sm text-slate-500 hover:text-slate-900 font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection
