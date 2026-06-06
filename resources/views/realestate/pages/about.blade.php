@extends('realestate.layout.app')

@section('title', 'About Us - Spring Realty')

@section('content')
    {{-- Hero --}}
    <section class="pt-28 pb-8 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">About Spring Realty</p>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">Your Tatu City Specialist</h1>
            <p class="text-slate-500 text-lg max-w-xl">We're not just another real estate agency. We know every corner of Tatu City — the developments, the investment potential, and the lifestyle it offers.</p>
        </div>
    </section>

    {{-- Story --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold tracking-tight mb-6">Why Tatu City?</h2>
                    <p class="text-slate-500 leading-relaxed mb-4">Tatu City is Nairobi's most ambitious new city — a 5,000-acre mixed-use development that's transforming how Kenyans live, work, and play. Located just 20 minutes from Thika Road, it offers a self-contained lifestyle with world-class infrastructure, schools, and amenities.</p>
                    <p class="text-slate-500 leading-relaxed mb-4">As Special Economic Zone residents, Tatu City property owners enjoy significant tax benefits. The infrastructure is already 99.7% operational — roads, water, sewerage, fiber internet, and reliable power are all in place.</p>
                    <p class="text-slate-500 leading-relaxed">Spring Realty was founded to help buyers navigate the Tatu City property market with confidence. We have deep relationships with all major developers — from Rendeavour to the independent teams behind developments like Jabali Towers, Porini Point, and NEXT Amani.</p>
                </div>
                <div class="rounded-4xl overflow-hidden">
                    <img src="https://jabalitowers.com/wp-content/uploads/2025/11/jpeg-optimizer_residenceimg.png" alt="Jabali Towers, Tatu City" loading="lazy" class="w-full h-[400px] object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-3xl border border-slate-100 p-8 text-center">
                    <p class="font-display text-4xl font-bold text-slate-900 mb-2">5,000</p>
                    <p class="text-slate-500 text-sm">Acres of mixed-use development</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 p-8 text-center">
                    <p class="font-display text-4xl font-bold text-slate-900 mb-2">6,000+</p>
                    <p class="text-slate-500 text-sm">Residents already living here</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 p-8 text-center">
                    <p class="font-display text-4xl font-bold text-slate-900 mb-2">110+</p>
                    <p class="text-slate-500 text-sm">Businesses operating in Tatu City</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 p-8 text-center">
                    <p class="font-display text-4xl font-bold text-slate-900 mb-2">99.7%</p>
                    <p class="text-slate-500 text-sm">Infrastructure uptime</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Developments --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-display text-3xl md:text-4xl font-bold tracking-tight mb-8">The Developments We Cover</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                    <img src="https://jabalitowers.com/wp-content/uploads/2025/11/elevations-scaled.jpg" alt="Jabali Towers" loading="lazy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Jabali Towers</h3>
                        <p class="text-slate-500 text-sm">Twin 20-storey towers with 290 luxury apartments and penthouses. Starting from KES 6M.</p>
                    </div>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                    <img src="https://www.tatucity.com/wp-content/uploads/2025/11/251110_FINAL_Aerial1_PORINI-POINT-scaled.jpg" alt="Porini Point" loading="lazy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Porini Point</h3>
                        <p class="text-slate-500 text-sm">Safari-inspired apartments overlooking Tatu City's wildlife sanctuary. Premium living with nature at your doorstep.</p>
                    </div>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                    <img src="https://static.tildacdn.one/tild3630-3833-4363-b161-356537633231/33.png" alt="NEXT Amani" loading="lazy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-slate-900 mb-2">NEXT Amani</h3>
                        <p class="text-slate-500 text-sm">Modern luxury apartments with pool facilities. Ideal for families and professionals.</p>
                    </div>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                    <img src="https://i.roamcdn.net/prop/brk/gallery-main-900w-watermark/51bb650110f0af1a33d8665a2e79de64/-/prod-property-core-backend-media-brk/9543392/fdaa248d-6d28-4e11-b553-188b0f24bc3c.jpeg" alt="156 Elara" loading="lazy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-slate-900 mb-2">156 Elara</h3>
                        <p class="text-slate-500 text-sm">Exclusive townhouses in a gated community. Privacy, space, and luxury combined.</p>
                    </div>
                </div>
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
                    <img src="https://www.tatucity.com/wp-content/uploads/WhatsApp-Image-2024-10-30-at-22.14.11-3-1600x900.jpeg" alt="Kijani Ridge" loading="lazy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-slate-900 mb-2">Kijani Ridge</h3>
                        <p class="text-slate-500 text-sm">Premium villas and townhouses with private gardens. The finest family homes in Tatu City.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="relative rounded-4xl overflow-hidden">
                <img src="https://www.tatucity.com/wp-content/uploads/Kijani-Ridge-R223-Twilight-Shot-1600x900.jpeg" alt="Kijani Ridge twilight" loading="lazy" class="w-full h-64 md:h-80 object-cover">
                <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Ready to Explore Tatu City?</h2>
                    <p class="text-slate-300 max-w-lg mb-8">Let us show you the best properties in Nairobi's most exciting new city. Call or WhatsApp us today.</p>
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="tel:+254757896465" class="bg-white text-slate-900 px-8 py-3.5 rounded-full font-semibold hover:bg-slate-100 transition-colors">
                            Call Now
                        </a>
                        <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20Tatu%20City%20properties." target="_blank" rel="noopener noreferrer" class="border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/10 transition-colors">
                            WhatsApp Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
