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
                               placeholder="e.g. Jabali Towers — 1 Bedroom Apartment">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400 resize-none"
                                  placeholder="Describe the property...">{{ old('description') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Development</label>
                            <select name="property_type" class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                                <option value="">Select development</option>
                                @foreach(['Jabali Towers', 'Porini Point', 'NEXT Amani', '156 Elara', 'Kijani Ridge'] as $dev)
                                    <option value="{{ $dev }}" {{ old('property_type') == $dev ? 'selected' : '' }}>{{ $dev }}</option>
                                @endforeach
                                <option value="custom" {{ old('property_type') == 'custom' ? 'selected' : '' }}>Other (type below)</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Unit Type</label>
                            <select name="unit_type" class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200">
                                <option value="">Select unit type</option>
                                @foreach(['Studio', '1-Bedroom', '2-Bedroom', '3-Bedroom', '4-Bedroom', 'Penthouse', 'Townhouse', 'Villa', 'Plot'] as $type)
                                    <option value="{{ $type }}" {{ old('unit_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
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
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Developer</label>
                            <input type="text" name="developer" value="{{ old('developer') }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="e.g. Rendeavour, Unity Homes, NEXT">
                        </div>
                        <div class="flex items-end gap-6 pb-1">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/10">
                                <span class="text-sm font-medium text-slate-600">Featured listing</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_featured_development" value="1" {{ old('is_featured_development') ? 'checked' : '' }} class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/10">
                                <span class="text-sm font-medium text-slate-600">Featured development</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Price & Location --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Price & Location</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Price (KES)</label>
                        <input type="number" name="price" value="{{ old('price') }}" required min="0" step="100000"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                               placeholder="e.g. 6000000">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Address</label>
                            <input type="text" name="address" value="{{ old('address') }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="Tatu City, Nairobi">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">City</label>
                            <input type="text" name="city" value="{{ old('city', 'Nairobi') }}"
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
                        <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" min="0"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="3">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms') }}" min="0" step="0.5"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="2">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Size (sqm)</label>
                        <input type="number" name="size_sqm" value="{{ old('size_sqm') }}" min="0" step="0.01"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="65">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Sq Ft</label>
                        <input type="number" name="square_feet" value="{{ old('square_feet') }}" min="0"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200" placeholder="700">
                    </div>
                </div>
            </div>

            {{-- Payment & Features --}}
            <div class="bg-white rounded-3xl border border-slate-100 p-6">
                <h3 class="text-lg font-bold mb-5">Payment & Features</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Completion Date</label>
                            <input type="text" name="completion_date" value="{{ old('completion_date') }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="e.g. Q4 2028, 2026, Dec 2025">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Brochure URL</label>
                            <input type="url" name="brochure_url" value="{{ old('brochure_url') }}"
                                   class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                                   placeholder="https://...">
                        </div>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Payment Plan</label>
                        <input type="text" name="payment_plan" value="{{ old('payment_plan') }}"
                               class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400"
                               placeholder="e.g. 10% deposit, 36-month plan, 20/80">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Key Features (comma-separated)</label>
                        <textarea name="key_features" rows="2"
                                  class="w-full bg-slate-50 border-0 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400 resize-none"
                                  placeholder="e.g. Smart home, Rooftop terrace, EV charging, Concierge">{{ old('key_features') }}</textarea>
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
