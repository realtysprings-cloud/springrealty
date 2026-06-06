@extends('realestate.layout.app')

@section('seoTitle', 'Contact Spring Realty | Tatu City Real Estate Agent — Call or WhatsApp')
@section('seoDescription', 'Contact Spring Realty for Tatu City properties. Call +254 757 896 465 or WhatsApp us. We help you find luxury apartments, townhouses, and villas in Tatu City, Nairobi.')
@section('seoUrl', 'https://springreallty.com/contact')

@section('content')
    {{-- Hero --}}
    <section class="pt-28 pb-8 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Get In Touch</p>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">Let's Talk</h1>
            <p class="text-slate-500 text-lg max-w-xl">Ready to find your dream home in Tatu City? Give us a call or send us a message on WhatsApp. We'd love to hear from you.</p>
        </div>
    </section>

    {{-- Contact cards --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Phone card --}}
                <a href="tel:+254757896465" class="group block bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-slate-900 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Call Us</h3>
                    <p class="text-slate-500 mb-1">+254 757 896 465</p>
                    <p class="text-sm text-slate-400">Available Mon–Sat, 8am–7pm</p>
                </a>

                {{-- WhatsApp card --}}
                <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20Tatu%20City%20properties." target="_blank" rel="noopener noreferrer" class="group block bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-[#25D366]/10 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-[#25D366] group-hover:text-white transition-colors">
                        <svg class="w-6 h-6 text-[#25D366] group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">WhatsApp</h3>
                    <p class="text-slate-500 mb-1">+254 757 896 465</p>
                    <p class="text-sm text-slate-400">Instant replies, 7 days a week</p>
                </a>

                {{-- Email card --}}
                <a href="mailto:info@springreallty.com" class="group block bg-white rounded-3xl p-8 border border-slate-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mb-5 group-hover:bg-slate-900 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Email</h3>
                    <p class="text-slate-500 mb-1">info@springreallty.com</p>
                    <p class="text-sm text-slate-400">We reply within 24 hours</p>
                </a>

                {{-- Location card --}}
                <div class="group block bg-white rounded-3xl p-8 border border-slate-100">
                    <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Visit Us</h3>
                    <p class="text-slate-500 mb-1">Tatu City, Nairobi</p>
                    <p class="text-sm text-slate-400">Kenya's First Special Economic Zone</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('head')
@php
$jsonLd = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'ContactPage',
        'name' => 'Contact Spring Realty',
        'url' => 'https://springreallty.com/contact',
    ],
    [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://springreallty.com/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => 'https://springreallty.com/contact'],
        ],
    ],
];
@endphp
@endsection
