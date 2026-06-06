@extends('realestate.layout.app')

@section('seoTitle', 'About Spring Realty | Tatu City Property Specialists')
@section('seoDescription', 'Spring Realty is a specialist property consultancy in Tatu City, Nairobi. We help buyers find premium homes in Kenya\'s first Special Economic Zone — Jabali Towers, Porini Point, NEXT Amani, 156 Elara, and Kijani Ridge.')
@section('seoUrl', 'https://springreallty.com/about')

@section('content')
    {{-- Hero --}}
    <section class="pt-28 pb-8 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">About Spring Realty</p>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">Your Tatu City Specialist</h1>
            <p class="text-slate-500 text-lg max-w-xl">We're not just another real estate agency. We know every corner of Tatu City — the developments, the investment potential, and the lifestyle it offers.</p>
        </div>
    </section>

    {{-- Story --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold tracking-tight mb-6">Why Tatu City?</h2>
                    <p class="text-slate-500 leading-relaxed mb-4">Tatu City is a 5,000-acre master-planned city in Nairobi, Kenya's first Special Economic Zone (SEZ). It's home to over 6,000 residents and 110+ businesses, with world-class infrastructure, schools, and amenities.</p>
                    <p class="text-slate-500 leading-relaxed mb-6">From luxury apartments at Jabali Towers to safari-inspired living at Porini Point — every development offers something unique. We help you navigate the options and find the perfect fit.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl p-4 border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">5,000</p>
                            <p class="text-xs text-slate-400">Acres Master-Planned</p>
                        </div>
                        <div class="bg-white rounded-2xl p-4 border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">6,000+</p>
                            <p class="text-xs text-slate-400">Residents</p>
                        </div>
                        <div class="bg-white rounded-2xl p-4 border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">110+</p>
                            <p class="text-xs text-slate-400">Businesses</p>
                        </div>
                        <div class="bg-white rounded-2xl p-4 border border-slate-100">
                            <p class="text-2xl font-bold text-slate-900">99.7%</p>
                            <p class="text-xs text-slate-400">Infrastructure Done</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden">
                    <img src="https://www.tatucity.com/wp-content/uploads/2025/11/251110_FINAL_Aerial1_PORINI-POINT-scaled.jpg" alt="Tatu City aerial view" class="w-full h-[400px] object-cover" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    {{-- Developments --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-display text-3xl font-bold tracking-tight mb-8">Our Developments</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('properties.index', ['development' => 'Jabali Towers']) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
                    <div class="h-48 overflow-hidden">
                        <img src="https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png" alt="Jabali Towers" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1">Jabali Towers</h3>
                        <p class="text-sm text-slate-500">Luxury Apartments & Penthouses</p>
                    </div>
                </a>
                <a href="{{ route('properties.index', ['development' => 'Porini Point']) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
                    <div class="h-48 overflow-hidden">
                        <img src="https://jabalitowers.com/wp-content/uploads/2025/12/251110_TATU-CreatShot03-PORINI-POINT.jpg" alt="Porini Point" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1">Porini Point</h3>
                        <p class="text-sm text-slate-500">Safari-Inspired Living</p>
                    </div>
                </a>
                <a href="{{ route('properties.index', ['development' => 'NEXT Amani']) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
                    <div class="h-48 overflow-hidden">
                        <img src="https://static.tildacdn.one/tild3630-3833-4363-b161-356537633231/33.png" alt="NEXT Amani" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1">NEXT Amani</h3>
                        <p class="text-sm text-slate-500">Modern Apartments</p>
                    </div>
                </a>
                <a href="{{ route('properties.index', ['development' => '156 Elara']) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
                    <div class="h-48 overflow-hidden">
                        <img src="https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/d7ec6b3eb3b9073932595d86e0fb032e/-eyJvdyI6IkNBUlRJRVIgQ0FSVEVSIFJFQUxUT1JTIn0%3D/prod-property-core-backend-media-brk/9543386/377b65f0-79b0-428e-954e-2defb7bc0e82.jpeg" alt="156 Elara" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1">156 Elara</h3>
                        <p class="text-sm text-slate-500">Exclusive Townhouses by Mi Vida Homes</p>
                    </div>
                </a>
                <a href="{{ route('properties.index', ['development' => 'Kijani Ridge']) }}" class="group block bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all">
                    <div class="h-48 overflow-hidden">
                        <img src="https://www.tatucity.com/wp-content/uploads/Kijani-Ridge-R223-Twilight-Shot-1600x900.jpeg" alt="Kijani Ridge" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1">Kijani Ridge</h3>
                        <p class="text-sm text-slate-500">Premium Villas</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-slate-900 rounded-3xl p-8 md:p-12 text-center">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">Ready to Find Your Home?</h2>
                <p class="text-slate-400 mb-6 max-w-lg mx-auto">Let's discuss your needs and find the perfect property in Tatu City.</p>
                <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27d%20like%20to%20know%20more%20about%20Tatu%20City%20properties." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-[#25D366] text-white px-8 py-3 rounded-full font-semibold hover:bg-[#1da851] transition-colors">
                    Chat on WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection

@section('head')
@php
$jsonLd = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'AboutPage',
        'name' => 'About Spring Realty',
        'description' => 'Spring Realty is a specialist property consultancy in Tatu City, Nairobi.',
        'url' => 'https://springreallty.com/about',
    ],
    [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://springreallty.com/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => 'https://springreallty.com/about'],
        ],
    ],
];
@endphp
@endsection
