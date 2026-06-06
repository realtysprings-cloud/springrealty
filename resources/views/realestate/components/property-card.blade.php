@if(isset($large) && $large)
    {{-- Large bento card --}}
    <a href="{{ route('properties.show', $property->id) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 h-full">
        <div class="relative h-64 md:h-full min-h-[280px] overflow-hidden">
            @if($property->images->first())
                <img src="{{ asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
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
    {{-- Regular bento card --}}
    <a href="{{ route('properties.show', $property->id) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
        <div class="relative h-52 overflow-hidden">
            @if($property->images->first())
                <img src="{{ asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&q=80" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
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
