@extends('realestate.layout.app')

@section('title', 'Spring Realty - Find Your Dream Home')

@section('content')
    @include('realestate.components.homepage.hero')
    @include('realestate.components.homepage.featured-properties', ['properties' => $properties])

    {{-- Stats bar --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-slate-900 rounded-4xl p-8 md:p-12 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-white mb-1">6+</p>
                    <p class="text-slate-400 text-sm">Active Listings</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-white mb-1">50+</p>
                    <p class="text-slate-400 text-sm">Happy Clients</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-white mb-1">5+</p>
                    <p class="text-slate-400 text-sm">Years Experience</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-white mb-1">10+</p>
                    <p class="text-slate-400 text-sm">Neighborhoods</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Why choose us bento --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Why Us</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight">Why Choose Spring Realty</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-lg hover:shadow-slate-100 transition-shadow">
                    <div class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Trusted & Verified</h3>
                    <p class="text-slate-500 leading-relaxed">Every property is personally verified by our team. No surprises, no hidden issues — just honest, transparent dealings.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-lg hover:shadow-slate-100 transition-shadow">
                    <div class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Expert Local Agents</h3>
                    <p class="text-slate-500 leading-relaxed">Our agents know every neighborhood in Nairobi. Get insider knowledge on the best areas, schools, and investment opportunities.</p>
                </div>
                <div class="bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-lg hover:shadow-slate-100 transition-shadow">
                    <div class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fast & Seamless</h3>
                    <p class="text-slate-500 leading-relaxed">From viewing to closing, we handle everything. Our streamlined process gets you into your new home faster.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-4xl p-10 md:p-16 text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
                </div>
                <div class="relative">
                    <h2 class="font-display text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight">Ready to Find Your<br>Dream Home?</h2>
                    <p class="text-slate-400 text-lg max-w-lg mx-auto mb-8">Browse our curated collection of premium properties across Nairobi's finest neighborhoods.</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('properties.index') }}" class="bg-white text-slate-900 px-8 py-3.5 rounded-full font-semibold hover:bg-slate-100 transition-colors">
                            Browse Properties
                        </a>
                        <a href="{{ route('contact') }}" class="border border-slate-600 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-slate-800 transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
