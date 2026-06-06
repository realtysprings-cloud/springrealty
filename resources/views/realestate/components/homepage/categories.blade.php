@php
    $developments = [
        ['name' => 'Jabali Towers', 'tagline' => 'Studios to Penthouses | From KES 6.1M', 'route' => 'Jabali Towers', 'image' => 'https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png'],
        ['name' => 'Porini Point', 'tagline' => '1, 2 & 3 Bed | Wildlife Sanctuary Views | From KES 5.99M', 'route' => 'Porini Point', 'image' => 'https://www.tatucity.com/wp-content/uploads/2025/11/251110_FINAL_Aerial1_PORINI-POINT-scaled.jpg'],
        ['name' => 'NEXT Amani', 'tagline' => 'Studios to 3 Bed | Global Developer | From KES 6.5M', 'route' => 'NEXT Amani', 'image' => 'https://static.tildacdn.one/tild3630-3833-4363-b161-356537633231/33.png'],
        ['name' => '156 Elara', 'tagline' => '3 & 4 Bed Townhouses | Exclusive 156 Homes | From KES 29.9M', 'route' => '156 Elara', 'image' => 'https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/d7ec6b3eb3b9073932595d86e0fb032e/-eyJvdyI6IkNBUlRJRVIgQ0FSVEVSIFJFQUxUT1JTIn0%3D/prod-property-core-backend-media-brk/9543386/377b65f0-79b0-428e-954e-2defb7bc0e82.jpeg'],
        ['name' => 'Kijani Ridge', 'tagline' => '1/4 & 1/2 Acre Plots | Dam Views | From KES 24M', 'route' => 'Kijani Ridge', 'image' => 'https://www.tatucity.com/wp-content/uploads/WhatsApp-Image-2024-10-30-at-22.14.11-3-1600x900.jpeg'],
    ];
@endphp

<section class="py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Tatu City Developments</p>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight">Browse by Development</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($developments as $dev)
                <a href="{{ route('properties.index', ['type' => $dev['route']]) }}" class="group relative bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 h-72">
                    <img src="{{ $dev['image'] }}" alt="{{ $dev['name'] }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-1">{{ $dev['name'] }}</h3>
                        <p class="text-white/60 text-sm leading-relaxed">{{ $dev['tagline'] }}</p>
                        <div class="mt-3 flex items-center gap-2 text-white text-sm font-semibold">
                            View Units
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
