@extends('realestate.layout.app')

@section('title', $property->title . ' - Spring Realty')

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
                    @php
                        $placeholderImages = [
                            'Jabali Towers' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=1600&h=700&fit=crop&q=85',
                            'NEXT Amani' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1600&h=700&fit=crop&q=85',
                            'Porini Point' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=1600&h=700&fit=crop&q=85',
                            '156 Elara' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1600&h=700&fit=crop&q=85',
                            'Kijani Ridge' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600&h=700&fit=crop&q=85',
                        ];
                        $dev = $property->property_type ?? 'Jabali Towers';
                    @endphp
                    <img src="{{ $placeholderImages[$dev] ?? $placeholderImages['Jabali Towers'] }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
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
                            @if($property->developer)
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-slate-900 text-white">
                                    {{ $property->developer }}
                                </span>
                            @endif
                            @if($property->unit_type)
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 capitalize">
                                    {{ ucfirst(str_replace('-', ' ', $property->unit_type)) }}
                                </span>
                            @endif
                            @if($property->is_featured_development)
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700">
                                    Featured Development
                                </span>
                            @endif
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold tracking-tight mb-2">{{ $property->title }}</h1>
                        <p class="text-slate-500 flex items-center gap-2 mb-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $property->address }}, {{ $property->city }}
                        </p>
                        <p class="text-sm text-slate-400">{{ $property->property_type }}</p>
                    </div>

                    {{-- Quick stats --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @if($property->bedrooms !== null && $property->bedrooms > 0)
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <p class="text-2xl font-bold">{{ $property->bedrooms }}</p>
                                <p class="text-xs text-slate-400 font-medium">Bedrooms</p>
                            </div>
                        @endif
                        @if($property->bathrooms)
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <p class="text-2xl font-bold">{{ $property->bathrooms }}</p>
                                <p class="text-xs text-slate-400 font-medium">Bathrooms</p>
                            </div>
                        @endif
                        @if($property->size_sqm)
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <p class="text-2xl font-bold">{{ number_format($property->size_sqm) }}</p>
                                <p class="text-xs text-slate-400 font-medium">Sq Meters</p>
                            </div>
                        @endif
                        @if($property->unit_type === 'studio')
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <p class="text-2xl font-bold">Studio</p>
                                <p class="text-xs text-slate-400 font-medium">Unit Type</p>
                            </div>
                        @elseif($property->unit_type === 'plot')
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 text-center">
                                <p class="text-2xl font-bold">Plot</p>
                                <p class="text-xs text-slate-400 font-medium">Unit Type</p>
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    @if($property->description)
                        <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8">
                            <h2 class="text-xl font-bold mb-4">About {{ $property->property_type }}</h2>
                            <p class="text-slate-600 leading-relaxed whitespace-pre-line">{{ $property->description }}</p>
                        </div>
                    @endif

                    {{-- Key Features --}}
                    @if($property->key_features)
                        <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8">
                            <h2 class="text-xl font-bold mb-4">Key Features</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                @foreach(explode("\n", $property->key_features) as $feature)
                                    @if(trim($feature))
                                        <div class="flex items-start gap-3">
                                            <div class="w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                                            </div>
                                            <p class="text-slate-600 text-sm">{{ trim($feature) }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Property details grid --}}
                    <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8">
                        <h2 class="text-xl font-bold mb-5">Property Details</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-slate-400">Development</span>
                                <span class="text-sm font-semibold">{{ $property->property_type }}</span>
                            </div>
                            @if($property->developer)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Developer</span>
                                    <span class="text-sm font-semibold">{{ $property->developer }}</span>
                                </div>
                            @endif
                            @if($property->unit_type)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Unit Type</span>
                                    <span class="text-sm font-semibold capitalize">{{ ucfirst(str_replace('-', ' ', $property->unit_type)) }}</span>
                                </div>
                            @endif
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-slate-400">Status</span>
                                <span class="text-sm font-semibold">{{ ucfirst(str_replace('_', ' ', $property->status)) }}</span>
                            </div>
                            @if($property->completion_date)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Completion</span>
                                    <span class="text-sm font-semibold">{{ $property->completion_date }}</span>
                                </div>
                            @endif
                            @if($property->size_sqm)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Size</span>
                                    <span class="text-sm font-semibold">{{ number_format($property->size_sqm) }} sqm</span>
                                </div>
                            @endif
                            @if($property->bedrooms !== null)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Bedrooms</span>
                                    <span class="text-sm font-semibold">{{ $property->bedrooms === 0 ? 'Studio' : $property->bedrooms }}</span>
                                </div>
                            @endif
                            @if($property->bathrooms)
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-slate-400">Bathrooms</span>
                                    <span class="text-sm font-semibold">{{ $property->bathrooms }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Payment Plan --}}
                    @if($property->payment_plan)
                        <div class="bg-white rounded-3xl border border-slate-100 p-6 md:p-8">
                            <h2 class="text-xl font-bold mb-4">Payment Plan</h2>
                            <p class="text-slate-600 leading-relaxed whitespace-pre-line">{{ $property->payment_plan }}</p>
                        </div>
                    @endif
                </div>

                {{-- Right: Sidebar --}}
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl border border-slate-100 p-6 sticky top-28">
                        <p class="text-3xl font-bold mb-1">KES {{ number_format($property->price) }}</p>
                        <p class="text-sm text-slate-400 mb-6">{{ ucfirst(str_replace('_', ' ', $property->status)) }} — {{ $property->property_type }}</p>

                        <div class="space-y-3">
                            <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20{{ urlencode($property->title) }}%20(https://springreallty.com/properties/{{ $property->id }})" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full bg-[#25D366] text-white py-3.5 rounded-full font-semibold hover:bg-[#20bd5a] transition-colors">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Chat on WhatsApp
                            </a>
                            <a href="tel:+254757896465" class="flex items-center justify-center gap-2 w-full bg-slate-900 text-white py-3.5 rounded-full font-semibold hover:bg-slate-800 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                Call Now
                            </a>
                            @if($property->brochure_url)
                                <a href="{{ $property->brochure_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full border border-slate-200 text-slate-700 py-3.5 rounded-full font-semibold hover:border-slate-900 hover:text-slate-900 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Download Brochure
                                </a>
                            @endif
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
                    <h2 class="font-display text-3xl md:text-4xl font-bold tracking-tight">More from {{ $property->property_type }}</h2>
                </div>
                <a href="{{ route('properties.index', ['type' => $property->property_type]) }}" class="hidden md:inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                    View All {{ $property->property_type }} &rarr;
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
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Interested in {{ $property->property_type }}?</h2>
                    <p class="text-slate-300 max-w-lg mb-8">Flexible payment plans available. Contact us for a private viewing.</p>
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20{{ urlencode($property->title) }}" target="_blank" rel="noopener noreferrer" class="bg-emerald-600 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-emerald-700 transition-colors">WhatsApp Us</a>
                        <a href="tel:+254757896465" class="border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/10 transition-colors">Call Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
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
