<section class="py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Browse By Type</p>
            <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight">Explore Properties</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <a href="{{ route('properties.index', ['type' => 'house']) }}" class="group relative rounded-3xl overflow-hidden aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=1000&fit=crop&q=85" alt="Houses" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-white text-xl font-bold mb-1">Houses</h3>
                    <p class="text-white/60 text-sm">Luxury homes & family houses</p>
                </div>
            </a>
            <a href="{{ route('properties.index', ['type' => 'apartment']) }}" class="group relative rounded-3xl overflow-hidden aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&h=1000&fit=crop&q=85" alt="Apartments" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-white text-xl font-bold mb-1">Apartments</h3>
                    <p class="text-white/60 text-sm">Modern city living</p>
                </div>
            </a>
            <a href="{{ route('properties.index', ['type' => 'condo']) }}" class="group relative rounded-3xl overflow-hidden aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&h=1000&fit=crop&q=85" alt="Condos" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-white text-xl font-bold mb-1">Condos</h3>
                    <p class="text-white/60 text-sm">Premium waterfront living</p>
                </div>
            </a>
            <a href="{{ route('properties.index', ['type' => 'land']) }}" class="group relative rounded-3xl overflow-hidden aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&h=1000&fit=crop&q=85" alt="Land" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-white text-xl font-bold mb-1">Land</h3>
                    <p class="text-white/60 text-sm">Plots & investment land</p>
                </div>
            </a>
        </div>
    </div>
</section>
