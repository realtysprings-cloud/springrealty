<section class="pt-28 pb-8 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
            {{-- Left: Headline + search --}}
            <div class="py-8 lg:py-12">
                <div class="inline-flex items-center gap-2 bg-slate-900/5 border border-slate-200 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="text-xs font-semibold text-slate-600 tracking-wide">NAIROBI'S TRUSTED REALTY</span>
                </div>
                <h1 class="font-display text-5xl md:text-6xl lg:text-[4.2rem] font-bold leading-[1.05] tracking-tight mb-6">
                    Find Your<br>Dream Home<br>In Kenya
                </h1>
                <p class="text-base text-slate-500 max-w-md mb-8 leading-relaxed">
                    At Spring Realty we are dedicated to helping individuals, families, and businesses find their perfect property. Whether you are looking to buy, sell, rent, or invest in real estate, our team of experienced agents provides professional guidance and personalized solutions tailored to your needs.
                </p>
                <form action="{{ route('properties.index') }}" method="GET" class="flex items-center bg-white rounded-full shadow-lg shadow-slate-200/60 border border-slate-100 p-1.5 max-w-md">
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
                {{-- Featured property --}}
                <div class="col-span-2 relative rounded-3xl overflow-hidden h-64 lg:h-72 group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=1200&h=800&fit=crop&q=85" alt="Featured luxury home in Nairobi" loading="eager" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-white/70 text-xs font-bold uppercase tracking-widest mb-1">Featured Listing</p>
                        <h3 class="text-white text-xl font-bold mb-2">Exceptional Properties in Stunning Surroundings</h3>
                        <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-white/95 backdrop-blur text-slate-900 text-xs font-bold px-4 py-2 rounded-full hover:bg-white transition-colors">
                            View Properties
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Stats card --}}
                <div class="bg-slate-900 text-white rounded-3xl p-6 flex flex-col justify-between aspect-square">
                    <p class="text-5xl font-bold">6+</p>
                    <p class="text-sm text-slate-400 leading-snug">Premium Properties<br>Available Now</p>
                </div>

                {{-- Category cards --}}
                <div class="grid grid-rows-2 gap-4">
                    <a href="{{ route('properties.index', ['type' => 'house']) }}" class="relative rounded-3xl overflow-hidden group cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=600&h=400&fit=crop&q=85" alt="Houses in Nairobi" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <p class="absolute bottom-3 left-4 text-white font-bold text-sm">Houses</p>
                    </a>
                    <a href="{{ route('properties.index', ['type' => 'apartment']) }}" class="relative rounded-3xl overflow-hidden group cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600&h=400&fit=crop&q=85" alt="Apartments in Nairobi" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <p class="absolute bottom-3 left-4 text-white font-bold text-sm">Apartments</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
