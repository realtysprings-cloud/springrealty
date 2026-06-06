@extends('realestate.layout.app')

@section('seoTitle', $property->title . ' | ' . $property->developer . ' — Spring Realty')
@section('seoDescription', $property->title . ' in Tatu City, Nairobi. ' . ($property->bedrooms ? $property->bedrooms . ' beds, ' : '') . ($property->bathrooms ? $property->bathrooms . ' baths, ' : '') . ($property->size_sqm ? $property->size_sqm . ' sqm. ' : '') . 'From KES ' . number_format($property->price) . '. Developer: ' . $property->developer . '. Payment plan available.')
@section('seoImage', $property->images->first() ? (str_starts_with($property->images->first()->image, 'http') ? $property->images->first()->image : asset('storage/' . $property->images->first()->image)) : 'https://springreallty.com/images/og-default.jpg')
@section('seoUrl', url()->current())
@section('seoType', 'article')

@section('content')
    {{-- Image gallery --}}
    <section class="pt-24 pb-6 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            @if($property->images->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 rounded-3xl overflow-hidden" id="gallery">
                    <div class="md:col-span-2 relative aspect-[16/10] md:aspect-auto md:h-[480px] overflow-hidden cursor-pointer group" onclick="openLightbox(0)">
                        <img src="{{ str_starts_with($property->images->first()->image, 'http') ? $property->images->first()->image : asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                        @if($property->images->count() > 1)
                            <span class="absolute bottom-4 left-4 bg-black/60 backdrop-blur text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                                1 / {{ $property->images->count() }} photos
                            </span>
                        @endif
                    </div>
                    <div class="hidden md:grid grid-rows-2 gap-3">
                        @foreach($property->images->slice(1, 2) as $i => $img)
                            <div class="relative overflow-hidden cursor-pointer group" onclick="openLightbox({{ $i + 1 }})">
                                <img src="{{ str_starts_with($img->image, 'http') ? $img->image : asset('storage/' . $img->image) }}" alt="{{ $property->title }} photo {{ $i + 2 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                                @if($i === 1 && $property->images->count() > 3)
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                        <span class="text-white text-lg font-bold">+{{ $property->images->count() - 3 }} more</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="rounded-3xl overflow-hidden bg-slate-100 h-[400px] flex items-center justify-center">
                    <p class="text-slate-400">No images available</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Property details --}}
    <section class="py-6 px-4 md:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main content --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Title & meta --}}
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="bg-slate-900 text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase">{{ $property->developer }}</span>
                        @if($property->is_featured_development)
                            <span class="bg-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-full">Featured</span>
                        @endif
                    </div>
                    <h1 class="font-display text-3xl md:text-4xl font-bold tracking-tight mb-2">{{ $property->title }}</h1>
                    <p class="text-slate-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $property->address }}, {{ $property->city }}
                    </p>
                </div>

                {{-- Quick stats --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @if($property->bedrooms !== null && $property->bedrooms > 0)
                        <div class="bg-white rounded-2xl p-4 text-center border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">{{ $property->bedrooms }}</p>
                            <p class="text-xs text-slate-400 mt-1">Bedrooms</p>
                        </div>
                    @endif
                    @if($property->bathrooms)
                        <div class="bg-white rounded-2xl p-4 text-center border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">{{ $property->bathrooms }}</p>
                            <p class="text-xs text-slate-400 mt-1">Bathrooms</p>
                        </div>
                    @endif
                    @if($property->size_sqm)
                        <div class="bg-white rounded-2xl p-4 text-center border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">{{ number_format($property->size_sqm) }}</p>
                            <p class="text-xs text-slate-400 mt-1">Sq. Meters</p>
                        </div>
                    @endif
                    @if($property->completion_date)
                        <div class="bg-white rounded-2xl p-4 text-center border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">{{ $property->completion_date }}</p>
                            <p class="text-xs text-slate-400 mt-1">Completion</p>
                        </div>
                    @endif
                </div>

                {{-- Description --}}
                @if($property->description)
                    <div class="bg-white rounded-2xl p-6 border border-slate-100">
                        <h2 class="font-display text-xl font-bold mb-3">About This Property</h2>
                        <p class="text-slate-600 leading-relaxed">{{ $property->description }}</p>
                    </div>
                @endif

                {{-- Key features --}}
                @if($property->key_features && count($property->key_features) > 0)
                    <div class="bg-white rounded-2xl p-6 border border-slate-100">
                        <h2 class="font-display text-xl font-bold mb-3">Key Features</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach($property->key_features as $feature)
                                <div class="flex items-center gap-2 text-sm text-slate-600">
                                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                                    {{ $feature }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Price card --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-100 sticky top-24">
                    <p class="text-sm text-slate-400 mb-1">Starting from</p>
                    <p class="text-3xl font-bold text-slate-900 mb-4">KES {{ number_format($property->price) }}</p>

                    @if($property->payment_plan)
                        <div class="bg-emerald-50 rounded-xl p-4 mb-4">
                            <p class="text-xs font-semibold text-emerald-700 uppercase mb-1">Payment Plan</p>
                            <p class="text-sm text-emerald-800">{{ $property->payment_plan }}</p>
                        </div>
                    @endif

                    <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20{{ urlencode($property->title) }}%20(KES%20{{ $property->price }})." target="_blank" rel="noopener noreferrer" class="block w-full bg-[#25D366] text-white text-center py-3 rounded-xl font-semibold hover:bg-[#1da851] transition-colors mb-3">
                        Chat on WhatsApp
                    </a>
                    <a href="tel:+254757896465" class="block w-full bg-slate-900 text-white text-center py-3 rounded-xl font-semibold hover:bg-slate-800 transition-colors">
                        Call Now
                    </a>

                    @if($property->brochure_url)
                        <a href="{{ $property->brochure_url }}" target="_blank" rel="noopener noreferrer" class="block w-full text-center py-3 rounded-xl font-semibold border border-slate-200 text-slate-700 hover:bg-slate-50 transition-colors mt-3">
                            Download Brochure
                        </a>
                    @endif
                </div>

                {{-- External listing link --}}
                @if($property->external_url)
                    <div class="bg-white rounded-2xl p-6 border border-slate-100">
                        <p class="text-sm text-slate-400 mb-2">View full listing with floor plans</p>
                        <a href="{{ $property->external_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-slate-900 font-semibold hover:underline">
                            View on {{ $property->external_source ?? 'Listing Site' }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Related properties --}}
    @if($relatedProperties->count() > 0)
        <section class="py-12 px-4 md:px-8">
            <div class="max-w-7xl mx-auto">
                <h2 class="font-display text-2xl font-bold mb-6">More from {{ $property->property_type }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedProperties as $related)
                        @include('realestate.components.property-card', ['property' => $related])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Lightbox --}}
    @if($property->images->count() > 0)
        <div id="lightbox" class="hidden fixed inset-0 bg-black/90 z-[100] flex items-center justify-center" onclick="closeLightbox()">
            <button class="absolute top-6 right-6 text-white/70 hover:text-white" onclick="closeLightbox()">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <button class="absolute left-4 text-white/70 hover:text-white" onclick="event.stopPropagation(); navigateLightbox(-1)">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
            </button>
            <img id="lightbox-img" src="" alt="" class="max-h-[85vh] max-w-[90vw] object-contain rounded-lg" onclick="event.stopPropagation()">
            <button class="absolute right-4 text-white/70 hover:text-white" onclick="event.stopPropagation(); navigateLightbox(1)">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
            </button>
            <p id="lightbox-caption" class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/60 text-sm"></p>
        </div>
    @endif
@endsection

@section('head')
@php
    $primaryImage = $property->images->first()
        ? (str_starts_with($property->images->first()->image, 'http') ? $property->images->first()->image : asset('storage/' . $property->images->first()->image))
        : 'https://springreallty.com/images/og-default.jpg';

    $jsonLd = [
        [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $property->title,
            'description' => $property->description ?? $property->title . ' in Tatu City, Nairobi',
            'image' => $primaryImage,
            'brand' => ['@type' => 'Brand', 'name' => $property->developer],
            'offers' => [
                '@type' => 'Offer',
                'price' => $property->price,
                'priceCurrency' => 'KES',
                'availability' => 'https://schema.org/InStock',
                'url' => url()->current(),
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Tatu City',
                'addressRegion' => 'Nairobi',
                'addressCountry' => 'KE',
            ],
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://springreallty.com/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Properties', 'item' => 'https://springreallty.com/properties'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $property->title, 'item' => url()->current()],
            ],
        ],
    ];
@endphp
@endsection

@section('scripts')
@if($property->images->count() > 0)
<script>
    const images = {!! json_encode($property->images->map(fn($img) => str_starts_with($img->image, 'http') ? $img->image : asset('storage/' . $img->image))) !!};
    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.body.style.overflow = '';
    }

    function navigateLightbox(dir) {
        currentIndex = (currentIndex + dir + images.length) % images.length;
        updateLightbox();
    }

    function updateLightbox() {
        document.getElementById('lightbox-img').src = images[currentIndex];
        document.getElementById('lightbox-caption').textContent = (currentIndex + 1) + ' / ' + images.length;
    }

    document.addEventListener('keydown', (e) => {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') navigateLightbox(-1);
        if (e.key === 'ArrowRight') navigateLightbox(1);
    });
</script>
@endif
@endsection
