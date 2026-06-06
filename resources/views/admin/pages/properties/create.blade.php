@extends('admin.layout.admin')

@section('title', 'Add Property')
@section('page-title', 'Add Property')

@section('content')
    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Basic Info --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Basic Information</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                               placeholder="Modern 3 Bedroom House in Nairobi">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400 resize-none"
                                  placeholder="Describe the property...">{{ old('description') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Property Type</label>
                            <select name="property_type" required class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                                <option value="house" {{ old('property_type') == 'house' ? 'selected' : '' }}>House</option>
                                <option value="apartment" {{ old('property_type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                <option value="condo" {{ old('property_type') == 'condo' ? 'selected' : '' }}>Condo</option>
                                <option value="land" {{ old('property_type') == 'land' ? 'selected' : '' }}>Land</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Status</label>
                            <select name="status" required class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                                <option value="for_sale" {{ old('status') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                <option value="for_rent" {{ old('status') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} id="featured" class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/10">
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
                        <input type="number" name="price" value="{{ old('price') }}" required min="0" step="100"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                               placeholder="12000000">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" required
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                               placeholder="Kilimani Road">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">City</label>
                            <input type="text" name="city" value="{{ old('city') }}" required
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="Nairobi">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">State</label>
                            <input type="text" name="state" value="{{ old('state') }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="Nairobi County">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Zip Code</label>
                            <input type="text" name="zip_code" value="{{ old('zip_code') }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="00100">
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
                        <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" min="0"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="3">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms') }}" min="0" step="0.5"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="2.5">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Sq Ft</label>
                        <input type="number" name="square_feet" value="{{ old('square_feet') }}" min="0"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="2500">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Year Built</label>
                        <input type="number" name="year_built" value="{{ old('year_built') }}" min="1900" max="{{ date('Y') + 1 }}"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="2020">
                    </div>
                </div>
            </div>

            {{-- Images --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Images</h3>
                <input type="file" name="images[]" multiple accept="image/*"
                       class="w-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl px-5 py-8 text-sm text-center text-slate-400 hover:border-slate-400 transition-colors cursor-pointer">
                <p class="text-xs text-slate-400 mt-2">JPG, PNG or WebP. Max 5MB each. Select multiple files.</p>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="bg-slate-900 text-white px-8 py-3 rounded-full font-semibold hover:bg-slate-800 transition-colors">
                    Create Property
                </button>
                <a href="{{ route('admin.properties.index') }}" class="text-sm text-slate-500 hover:text-slate-900 font-medium">Cancel</a>
            </div>
        </form>
    </div>
@endsection
