<section class="pt-28 pb-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-slate-900 text-white text-xs font-bold px-4 py-2 rounded-full mb-6 tracking-wider">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    TATU CITY — KENYA'S FIRST SEZ
                </div>
                <h1 class="font-display text-5xl md:text-7xl font-bold tracking-tight leading-[0.95] mb-6">
                    Invest in<br>Tatu City's<br>Finest Homes
                </h1>
                <p class="text-slate-500 text-lg leading-relaxed mb-8 max-w-lg">
                    Exclusive access to Jabali Towers, Porini Point, NEXT Amani, 156 Elara, and Kijani Ridge — premium developments in Kenya's 5,000-acre master-planned city. From studios to penthouses, serviced plots to luxury townhouses.
                </p>
                <div class="flex flex-col sm:flex-row items-stretch gap-3 bg-white rounded-2xl border border-slate-200 p-2 max-w-lg">
                    <div class="flex-1 flex items-center gap-3 px-4">
                        <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search Tatu City, Karen, Westlands..." class="w-full py-3 text-sm outline-none bg-transparent">
                    </div>
                    <button class="bg-slate-900 text-white px-6 py-3 rounded-xl font-semibold hover:bg-slate-800 transition-colors flex items-center justify-center gap-2">
                        Search
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-2 grid-rows-2 gap-4 h-[520px]">
                <a href="{{ route('properties.index', ['type' => 'Jabali Towers']) }}" class="col-span-2 relative rounded-3xl overflow-hidden group">
                    <img src="https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png" alt="Jabali Towers" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-5 left-5">
                        <p class="text-white/70 text-xs font-bold uppercase tracking-widest mb-1">Now Selling</p>
                        <p class="text-white text-xl font-bold">Jabali Towers — From KES 6.1M</p>
                    </div>
                    <div class="absolute top-5 left-5">
                        <span class="bg-white/90 backdrop-blur text-slate-900 text-xs font-bold px-3 py-1.5 rounded-full">View All Developments →</span>
                    </div>
                </a>
                <a href="{{ route('properties.index', ['type' => 'Porini Point']) }}" class="relative rounded-3xl overflow-hidden group">
                    <img src="https://www.tatucity.com/wp-content/uploads/2025/11/251110_FINAL_Aerial1_PORINI-POINT-scaled.jpg" alt="Porini Point" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <p class="text-white text-lg font-bold">Porini Point</p>
                    </div>
                </a>
                <a href="{{ route('properties.index', ['type' => 'NEXT Amani']) }}" class="relative rounded-3xl overflow-hidden group">
                    <img src="https://static.tildacdn.one/tild3630-3833-4363-b161-356537633231/33.png" alt="NEXT Amani" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <p class="text-white text-lg font-bold">NEXT Amani</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
