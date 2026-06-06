<section class="py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1200&h=1500&fit=crop&q=85" alt="Spring Realty team" loading="lazy" class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-6 -right-6 bg-slate-900 text-white rounded-3xl p-6 max-w-[200px] hidden md:block">
                    <p class="text-3xl font-bold mb-1">5+</p>
                    <p class="text-sm text-slate-400">Years of trusted service in Nairobi's real estate market</p>
                </div>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-3">About Us</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight mb-6">Your Trusted Partner In Real Estate</h2>
                <p class="text-slate-500 leading-relaxed mb-6">
                    Spring Realty is a leading real estate agency based in Nairobi, Kenya. We specialize in residential and commercial properties, offering expert guidance to first-time buyers, seasoned investors, and everyone in between.
                </p>
                <p class="text-slate-500 leading-relaxed mb-8">
                    Our deep knowledge of the Kenyan property market, combined with our commitment to transparency and client satisfaction, makes us the preferred choice for all your real estate needs.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('properties.index') }}" class="bg-slate-900 text-white px-6 py-3 rounded-full text-sm font-semibold hover:bg-slate-800 transition-colors">
                        View Properties
                    </a>
                    <a href="{{ route('contact') }}" class="border border-slate-300 text-slate-700 px-6 py-3 rounded-full text-sm font-semibold hover:border-slate-900 hover:text-slate-900 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
