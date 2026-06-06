@php
    $developments = [
        ['name' => 'Jabali Towers', 'tagline' => 'Studios to Penthouses | From KES 6.1M', 'route' => 'Jabali Towers'],
        ['name' => 'Porini Point', 'tagline' => '1, 2 & 3 Bed | Wildlife Sanctuary Views | From KES 5.99M', 'route' => 'Porini Point'],
        ['name' => 'NEXT Amani', 'tagline' => 'Studios to 3 Bed | Global Developer | From KES 6.5M', 'route' => 'NEXT Amani'],
        ['name' => '156 Elara', 'tagline' => '3 & 4 Bed Townhouses | Exclusive 156 Homes | From KES 29.9M', 'route' => '156 Elara'],
        ['name' => 'Kijani Ridge', 'tagline' => '1/4 & 1/2 Acre Plots | Dam Views | From KES 24M', 'route' => 'Kijani Ridge'],
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
                <a href="{{ route('properties.index', ['type' => $dev['route']]) }}" class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-slate-700 transition-colors">{{ $dev['name'] }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">{{ $dev['tagline'] }}</p>
                        <div class="mt-4 flex items-center gap-2 text-slate-900 text-sm font-semibold">
                            View Units
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
