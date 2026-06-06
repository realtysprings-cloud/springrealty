<section class="pt-28 pb-8 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Left: Big headline + search --}}
            <div class="flex flex-col justify-center py-8 lg:py-16">
                <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight mb-6">
                    Find Your<br>Dream Home<br>In Nairobi
                </h1>
                <p class="text-lg text-slate-500 max-w-md mb-8 leading-relaxed">
                    Discover exceptional properties in Kenya's most sought-after neighborhoods. Your perfect home awaits.
                </p>
                <form action="{{ route('properties.index') }}" method="GET" class="flex items-center bg-white rounded-full shadow-lg shadow-slate-200/50 border border-slate-100 p-1.5 max-w-md">
                    <div class="flex-1 flex items-center gap-2 px-4">
                        <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="city" placeholder="Search by city or area..." class="w-full bg-transparent text-sm py-2.5 outline-none placeholder:text-slate-400">
                    </div>
                    <button type="submit" class="bg-slate-900 text-white w-10 h-10 rounded-full flex items-center justify-center shrink-0 hover:bg-slate-800 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>

            {{-- Right: Bento grid --}}
            <div class="grid grid-cols-2 gap-4">
                {{-- Featured property image --}}
                <div class="col-span-2 relative rounded-3xl overflow-hidden h-64 lg:h-72 group">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80" alt="Featured property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-white/80 text-sm font-medium mb-1">Featured Listing</p>
                        <h3 class="text-white text-xl font-bold">Exceptional Properties in Stunning Locations</h3>
                        <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 mt-3 bg-white/90 backdrop-blur text-slate-900 text-sm font-semibold px-4 py-2 rounded-full hover:bg-white transition-colors">
                            View Properties
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Stats card --}}
                <div class="bg-slate-900 text-white rounded-3xl p-6 flex flex-col justify-between">
                    <p class="text-4xl font-bold">6+</p>
                    <p class="text-sm text-slate-400 mt-2">Premium Properties<br>Available Now</p>
                </div>

                {{-- Category cards --}}
                <div class="grid grid-rows-2 gap-4">
                    <a href="{{ route('properties.index', ['type' => 'house']) }}" class="relative rounded-3xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=400&q=80" alt="Houses" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                        <p class="absolute bottom-4 left-4 text-white font-bold text-sm">Houses</p>
                    </a>
                    <a href="{{ route('properties.index', ['type' => 'apartment']) }}" class="relative rounded-3xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=400&q=80" alt="Apartments" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                        <p class="absolute bottom-4 left-4 text-white font-bold text-sm">Apartments</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
