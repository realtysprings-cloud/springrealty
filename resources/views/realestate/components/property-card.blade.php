@php
    $placeholderImages = [
        'house' => [
            'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1200&h=800&fit=crop&q=85',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200&h=800&fit=crop&q=85',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1200&h=800&fit=crop&q=85',
            'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1200&h=800&fit=crop&q=85',
        ],
        'apartment' => [
            'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1200&h=800&fit=crop&q=85',
            'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1200&h=800&fit=crop&q=85',
            'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=1200&h=800&fit=crop&q=85',
        ],
        'condo' => [
            'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=1200&h=800&fit=crop&q=85',
            'https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=1200&h=800&fit=crop&q=85',
        ],
        'land' => [
            'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1200&h=800&fit=crop&q=85',
        ],
    ];
    $type = $property->property_type ?? 'house';
    $images = $placeholderImages[$type] ?? $placeholderImages['house'];
    $placeholderUrl = $images[$property->id % count($images)];
@endphp

@if(isset($large) && $large)
    <a href="{{ route('properties.show', $property->id) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 h-full">
        <div class="relative h-64 md:h-full min-h-[280px] overflow-hidden">
            @if($property->images->first())
                <img src="{{ asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="{{ $placeholderUrl }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute top-4 left-4">
                <span class="bg-white/90 backdrop-blur text-slate-900 text-xs font-bold px-3 py-1.5 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                </span>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
                <h3 class="text-white text-2xl font-bold mb-2 line-clamp-2">{{ $property->title }}</h3>
                <p class="text-white/70 text-sm flex items-center gap-1.5 mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $property->address }}, {{ $property->city }}
                </p>
                <div class="flex items-center justify-between">
                    <p class="text-white text-2xl font-bold">KES {{ number_format($property->price) }}</p>
                    <div class="flex items-center gap-3 text-white/80 text-sm">
                        @if($property->bedrooms)
                            <span class="flex items-center gap-1">{{ $property->bedrooms }} <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 7h20M2 7v10a2 2 0 002 2h16a2 2 0 002-2V7M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2"/></svg></span>
                        @endif
                        @if($property->bathrooms)
                            <span class="flex items-center gap-1">{{ $property->bathrooms }} <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 12h16a1 1 0 011 1v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a1 1 0 011-1zM6 12V5a2 2 0 012-2h3v2.25"/></svg></span>
                        @endif
                        @if($property->square_feet)
                            <span class="flex items-center gap-1">{{ number_format($property->square_feet) }} <span class="text-xs">sqft</span></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
@else
    <a href="{{ route('properties.show', $property->id) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
        <div class="relative h-52 overflow-hidden">
            @if($property->images->first())
                <img src="{{ asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="{{ $placeholderUrl }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @endif
            <div class="absolute top-4 left-4">
                <span class="bg-white/90 backdrop-blur text-slate-900 text-xs font-bold px-3 py-1.5 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                </span>
            </div>
        </div>
        <div class="p-5">
            <h3 class="text-lg font-bold text-slate-900 mb-1 line-clamp-1">{{ $property->title }}</h3>
            <p class="text-slate-400 text-sm flex items-center gap-1.5 mb-3">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $property->city }}
            </p>
            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                <p class="text-xl font-bold text-slate-900">KES {{ number_format($property->price) }}</p>
                <div class="flex items-center gap-2 text-slate-400 text-xs">
                    @if($property->bedrooms)
                        <span>{{ $property->bedrooms }} beds</span>
                    @endif
                    @if($property->bathrooms)
                        <span class="text-slate-300">|</span>
                        <span>{{ $property->bathrooms }} baths</span>
                    @endif
                </div>
            </div>
        </div>
    </a>
@endif
