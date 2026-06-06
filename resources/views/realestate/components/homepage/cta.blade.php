<section class="py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="relative rounded-4xl overflow-hidden">
            <img src="https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=1600&h=600&fit=crop&q=85" alt="Luxury property" loading="lazy" class="w-full h-80 md:h-96 object-cover">
            <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
                <h2 class="font-display text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight">Ready to Find Your<br>Dream Home?</h2>
                <p class="text-slate-300 text-lg max-w-lg mb-8">Browse our curated collection of premium properties across Nairobi's finest neighborhoods.</p>
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <a href="{{ route('properties.index') }}" class="bg-white text-slate-900 px-8 py-3.5 rounded-full font-semibold hover:bg-slate-100 transition-colors">
                        Browse Properties
                    </a>
                    <a href="{{ route('contact') }}" class="border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/10 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
