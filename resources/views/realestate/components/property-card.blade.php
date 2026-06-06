@php
    $developmentImages = [
        'Jabali Towers' => [
            'https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png',
            'https://jabalitowers.com/wp-content/uploads/2026/03/elevations-scaled.jpg',
        ],
        'NEXT Amani' => [
            'https://static.tildacdn.one/tild3630-3833-4363-b161-356537633231/33.png',
            'https://static.tildacdn.one/tild3036-3033-4465-b239-356638616531/_2025-11-20_12454037.png',
        ],
        'Porini Point' => [
            'https://www.tatucity.com/wp-content/uploads/2025/11/251110_FINAL_Aerial1_PORINI-POINT-scaled.jpg',
            'https://jabalitowers.com/wp-content/uploads/2025/12/251110_TATU-CreatShot03-PORINI-POINT.jpg',
        ],
        '156 Elara' => [
            'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/d7ec6b3eb3b9073932595d86e0fb032e/-eyJvdyI6IkNBUlRJRVIgQ0FSVEVSIFJFQUxUT1JTIn0%3D/prod-property-core-backend-media-brk/9543386/377b65f0-79b0-428e-954e-2defb7bc0e82.jpeg',
            'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/ff74fb59a510953c5610f081af041e77/-/prod-property-core-backend-media-brk/9543389/4c345090-e59a-46ac-8f5a-509c68c53dc3.jpeg',
            'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/51bb650110f0af1a33d8665a2e79de64/-/prod-property-core-backend-media-brk/9543392/fdaa248d-6d28-4e11-b553-188b0f24bc3c.jpeg',
            'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/0fc67d1a2383b4f5bc43b8f383ac409a/-/prod-property-core-backend-media-brk/9543395/c45a8836-42a9-4905-8af6-38d63b415ce9.jpeg',
            'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/a359d48d94178d74d5c4169f342f0f3f/-/prod-property-core-backend-media-brk/9543398/0b143b06-0f35-4369-ac7c-1c123793578e.jpeg',
            'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/3dc9df31a530a72579b8ad6670248c36/-/prod-property-core-backend-media-brk/9543401/22eca43e-0127-4b1b-8365-52d8da00857b.jpeg',
        ],
        'Kijani Ridge' => [
            'https://www.tatucity.com/wp-content/uploads/WhatsApp-Image-2024-10-30-at-22.14.11-3-1600x900.jpeg',
            'https://www.tatucity.com/wp-content/uploads/Kijani-Ridge-R223-Twilight-Shot-1600x900.jpeg',
        ],
    ];
    $dev = $property->property_type ?? 'Jabali Towers';
    $images = $developmentImages[$dev] ?? $developmentImages['Jabali Towers'];
    $cardImage = $images[$property->id % count($images)];
@endphp

@if(isset($large) && $large)
    <a href="{{ route('properties.show', $property->id) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 h-full">
        <div class="relative h-64 md:h-full min-h-[280px] overflow-hidden">
            @php $img = $property->images->first(); @endphp
            @if($img && str_starts_with($img->image, 'http'))
                <img src="{{ $img->image }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @elseif($img)
                <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="{{ $cardImage }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute top-4 left-4 flex items-center gap-2">
                <span class="bg-white/90 backdrop-blur text-slate-900 text-xs font-bold px-3 py-1.5 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                </span>
                @if($property->completion_date)
                    <span class="bg-emerald-500/90 backdrop-blur text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        {{ $property->completion_date }}
                    </span>
                @endif
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6">
                <p class="text-white/60 text-xs font-bold uppercase tracking-widest mb-1">{{ $property->developer }}</p>
                <h3 class="text-white text-2xl font-bold mb-2 line-clamp-2">{{ $property->title }}</h3>
                <p class="text-white/70 text-sm flex items-center gap-1.5 mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $property->address }}, {{ $property->city }}
                </p>
                <div class="flex items-center justify-between">
                    <p class="text-white text-2xl font-bold">KES {{ number_format($property->price) }}</p>
                    <div class="flex items-center gap-3 text-white/80 text-sm">
                        @if($property->bedrooms !== null && $property->bedrooms > 0)
                            <span class="flex items-center gap-1">{{ $property->bedrooms }} <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 7h20M2 7v10a2 2 0 002 2h16a2 2 0 002-2V7M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2"/></svg></span>
                        @endif
                        @if($property->bathrooms)
                            <span class="flex items-center gap-1">{{ $property->bathrooms }} <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 12h16a1 1 0 011 1v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a1 1 0 011-1zM6 12V5a2 2 0 012-2h3v2.25"/></svg></span>
                        @endif
                        @if($property->size_sqm)
                            <span class="flex items-center gap-1">{{ number_format($property->size_sqm) }} <span class="text-xs">sqm</span></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
@else
    <a href="{{ route('properties.show', $property->id) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
        <div class="relative h-52 overflow-hidden">
            @php $img = $property->images->first(); @endphp
            @if($img && str_starts_with($img->image, 'http'))
                <img src="{{ $img->image }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @elseif($img)
                <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="{{ $cardImage }}" alt="{{ $property->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @endif
            <div class="absolute top-4 left-4 flex items-center gap-2">
                <span class="bg-white/90 backdrop-blur text-slate-900 text-xs font-bold px-3 py-1.5 rounded-full">
                    {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                </span>
                @if($property->completion_date)
                    <span class="bg-emerald-500/90 backdrop-blur text-white text-xs font-bold px-3 py-1.5 rounded-full">
                        {{ $property->completion_date }}
                    </span>
                @endif
            </div>
        </div>
        <div class="p-5">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">{{ $property->developer }}</p>
            <h3 class="text-lg font-bold text-slate-900 mb-1 line-clamp-1">{{ $property->title }}</h3>
            <p class="text-slate-400 text-sm flex items-center gap-1.5 mb-3">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $property->city }}
            </p>
            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                <p class="text-xl font-bold text-slate-900">KES {{ number_format($property->price) }}</p>
                <div class="flex items-center gap-2 text-slate-400 text-xs">
                    @if($property->bedrooms !== null && $property->bedrooms > 0)
                        <span>{{ $property->bedrooms }} beds</span>
                    @elseif($property->unit_type === 'studio')
                        <span>Studio</span>
                    @elseif($property->unit_type === 'plot')
                        <span>Plot</span>
                    @endif
                    @if($property->bathrooms)
                        <span class="text-slate-300">|</span>
                        <span>{{ $property->bathrooms }} baths</span>
                    @endif
                </div>
            </div>
            @if($property->payment_plan)
                <p class="text-xs text-emerald-600 font-semibold mt-2">{{ Str::limit($property->payment_plan, 60) }}</p>
            @endif
        </div>
    </a>
@endif
