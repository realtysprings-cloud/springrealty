@extends('realestate.layout.app')

@section('title', $property->title . ' - Spring Realty')

@section('content')
    {{-- Image gallery --}}
    <section class="pt-24 pb-6 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            @if($property->images->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 rounded-3xl overflow-hidden" id="gallery">
                    {{-- Main image --}}
                    <div class="md:col-span-2 relative aspect-[16/10] md:aspect-auto md:h-[480px] overflow-hidden cursor-pointer group" onclick="openLightbox(0)">
                        <img src="{{ str_starts_with($property->images->first()->image, 'http') ? $property->images->first()->image : asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                        @if($property->images->count() > 1)
                            <span class="absolute bottom-4 left-4 bg-black/60 backdrop-blur text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                                1 / {{ $property->images->count() }} photos
                            </span>
                        @endif
                    </div>
                    {{-- Side images --}}
                    <div class="hidden md:grid grid-rows-2 gap-3">
                        @foreach($property->images->take(2) as $i => $image)
                            <div class="relative overflow-hidden cursor-pointer group" onclick="openLightbox({{ $i + 1 }})">
                                <img src="{{ str_starts_with($image->image, 'http') ? $image->image : asset('storage/' . $image->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                                @if($loop->last && $property->images->count() > 2)
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                        <span class="text-white text-lg font-bold">+{{ $property->images->count() - 2 }} more</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="rounded-3xl overflow-hidden aspect-[21/9] bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1600&h=700&fit=crop&q=85" alt="{{ $property->title }}" class="w-full h-full object-cover">
                </div>
            @endif
        </div>
    </section>

    {{-- Lightbox --}}
    @if($property->images->count() > 0)
    <div id="lightbox" class="hidden fixed inset-0 z-[100] bg-black/95 flex items-center justify-center" onclick="closeLightbox(event)">
        <button onclick="closeLightbox(event)" class="absolute top-6 right-6 text-white/70 hover:text-white z-10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <button onclick="prevImage(event)" class="absolute left-4 md:left-8 text-white/70 hover:text-white z-10">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="nextImage(event)" class="absolute right-4 md:right-8 text-white/70 hover:text-white z-10">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
        </button>
        <img id="lightbox-img" src="" alt="" class="max-h-[85vh] max-w-[90vw] object-contain rounded-lg">
        <p id="lightbox-counter" class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/60 text-sm font-medium"></p>
    </div>
    @endif

    {{-- Content --}}
    <section class="py-6 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left: Details --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- Header --}}
                    <div>
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold {{ $property->status === 'for_sale' ? 'bg-emerald-50 text-emerald-700' : ($property->status === 'for_rent' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-600') }}">
                                {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                            </span>
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 capitalize">
                                {{ $property->property_type }}
                            </span>
                            @if($property->featured)
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700">
                                    Featured
                                </span>
                            @endif
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold tracking-tight mb-3">{{ $property->title }}</h1>
                        <p class="text-slate-500 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $property->address }}, {{ $property->city }}{{ $property->state ? ', ' . $property->state : '' }}{{ $property->zip_code ? ' ' . $property->zip_code : '' }}
                        </p>
                    </div>

                    {{-- Quick stats --}}
                    <div class="grid grid-cols-3 gap-4">
                        @if($property->bedrooms)
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <svg class="w-6 h-6 mx-auto text-slate-400 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 7v11a1 1 0 001 1h16a1 1 0 001-1V7M3 7l9-4 9 4M3 7h18M6 11h.01M10 11h.01M14 11h.01M18 11h.01M8 15h8"/></svg>
                                <p class="text-2xl font-bold">{{ $property->bedrooms }}</p>
                                <p class="text-xs text-slate-400 font-medium">Bedrooms</p>
                            </div>
                        @endif
                        @if($property->bathrooms)
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <svg class="w-6 h-6 mx-auto text-slate-400 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 12h16a1 1 0 011 1v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3a1 1 0 011-1zM6 12V5a2 2 0 012-2h3v2.25"/></svg>
                                <p class="text-2xl font-bold">{{ $property->bathrooms }}</p>
                                <p class="text-xs text-slate-400 font-medium">Bathrooms</p>
                            </div>
                        @endif
                        @if($property->square_feet)
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <svg class="w-6 h-6 mx-auto text-slate-400 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                <p class="text-2xl font-bold">{{ number_format($property->square_feet) }}</p>
                                <p class="text-xs text-slate-400 font-medium">Sq Ft</p>
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    @if($property->description)
                        <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8">
                            <h2 class="text-xl font-bold mb-4">About This Property</h2>
                            <p class="text-slate-600 leading-relaxed whitespace-pre-line">{{ $property->description }}</p>
                        </div>
                    @endif

                    {{-- Property details grid --}}
                    <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8">
                        <h2 class="text-xl font-bold mb-5">Property Details</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-slate-400">Type</span>
                                <span class="text-sm font-semibold capitalize">{{ $property->property_type }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-slate-400">Status</span>
                                <span class="text-sm font-semibold">{{ ucfirst(str_replace('_', ' ', $property->status)) }}</span>
                            </div>
                            @if($property->year_built)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Year Built</span>
                                    <span class="text-sm font-semibold">{{ $property->year_built }}</span>
                                </div>
                            @endif
                            @if($property->bedrooms)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Bedrooms</span>
                                    <span class="text-sm font-semibold">{{ $property->bedrooms }}</span>
                                </div>
                            @endif
                            @if($property->bathrooms)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Bathrooms</span>
                                    <span class="text-sm font-semibold">{{ $property->bathrooms }}</span>
                                </div>
                            @endif
                            @if($property->square_feet)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Area</span>
                                    <span class="text-sm font-semibold">{{ number_format($property->square_feet) }} sqft</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Right: Sidebar --}}
                <div class="space-y-6">
                    {{-- Price card --}}
                    <div class="bg-white rounded-3xl border border-slate-100 p-6 sticky top-28">
                        <p class="text-3xl font-bold mb-1">KES {{ number_format($property->price) }}</p>
                        <p class="text-sm text-slate-400 mb-6">{{ ucfirst(str_replace('_', ' ', $property->status)) }}</p>

                        <div class="space-y-3">
                            <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20{{ urlencode($property->title) }}%20(https://springreallty.com/properties/{{ $property->id }})" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full bg-[#25D366] text-white py-3.5 rounded-full font-semibold hover:bg-[#20bd5a] transition-colors">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Chat on WhatsApp
                            </a>
                            <a href="tel:+254757896465" class="flex items-center justify-center gap-2 w-full bg-slate-900 text-white py-3.5 rounded-full font-semibold hover:bg-slate-800 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                Call Now
                            </a>
                            <button onclick="shareProperty()" class="flex items-center justify-center gap-2 w-full border border-slate-200 text-slate-700 py-3.5 rounded-full font-semibold hover:border-slate-900 hover:text-slate-900 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                                Share
                            </button>
                        </div>

                        <div class="mt-6 pt-6 border-t border-slate-100">
                            <p class="text-xs text-slate-400 text-center">Listed by Spring Realty</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related properties --}}
    @if(isset($relatedProperties) && $relatedProperties->count() > 0)
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Similar</p>
                    <h2 class="font-display text-3xl md:text-4xl font-bold tracking-tight">Related Properties</h2>
                </div>
                <a href="{{ route('properties.index') }}" class="hidden md:inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                    View All &rarr;
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach($relatedProperties as $related)
                    @include('realestate.components.property-card', ['property' => $related, 'large' => false])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="relative rounded-4xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=1600&h=500&fit=crop&q=85" alt="Spring Realty" loading="lazy" class="w-full h-64 md:h-80 object-cover">
                <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Interested in This Property?</h2>
                    <p class="text-slate-300 max-w-lg mb-8">Contact us today and let us help you make this property yours.</p>
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="tel:+254757896465" class="bg-white text-slate-900 px-8 py-3.5 rounded-full font-semibold hover:bg-slate-100 transition-colors">Call Now</a>
                        <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20{{ urlencode($property->title) }}" target="_blank" rel="noopener noreferrer" class="border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/10 transition-colors">WhatsApp Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Lightbox
    const images = {!! json_encode($property->images->map(fn($img) => str_starts_with($img->image, 'http') ? $img->image : asset('storage/' . $img->image)) ) !!};
    let currentIndex = 0;

    function openLightbox(index) {
        if (images.length === 0) return;
        currentIndex = index;
        document.getElementById('lightbox-img').src = images[currentIndex];
        document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + images.length;
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(e) {
        if (e.target.id === 'lightbox' || e.target.closest('button')) {
            document.getElementById('lightbox').classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function prevImage(e) {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        document.getElementById('lightbox-img').src = images[currentIndex];
        document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + images.length;
    }

    function nextImage(e) {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % images.length;
        document.getElementById('lightbox-img').src = images[currentIndex];
        document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + images.length;
    }

    document.addEventListener('keydown', (e) => {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape') document.getElementById('lightbox').classList.add('hidden');
        if (e.key === 'ArrowLeft') { currentIndex = (currentIndex - 1 + images.length) % images.length; document.getElementById('lightbox-img').src = images[currentIndex]; document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + images.length; }
        if (e.key === 'ArrowRight') { currentIndex = (currentIndex + 1) % images.length; document.getElementById('lightbox-img').src = images[currentIndex]; document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + images.length; }
    });

    function shareProperty() {
        if (navigator.share) {
            navigator.share({ title: '{{ $property->title }}', url: window.location.href });
        } else {
            navigator.clipboard.writeText(window.location.href);
            alert('Link copied!');
        }
    }
</script>
@endsection
