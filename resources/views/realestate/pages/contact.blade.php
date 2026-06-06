@extends('realestate.layout.app')

@section('title', 'Contact Us - Spring Realty')

@section('content')
    {{-- Hero --}}
    <section class="pt-28 pb-8 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Get In Touch</p>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">Let's Talk</h1>
            <p class="text-slate-500 text-lg max-w-xl">Ready to find your dream home? Give us a call or send us a message on WhatsApp. We'd love to hear from you.</p>
        </div>
    </section>

    {{-- Contact cards --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Phone card --}}
                <a href="tel:+254757896465" class="group relative bg-slate-900 rounded-4xl overflow-hidden p-10 md:p-12 flex flex-col justify-between min-h-[320px] hover:shadow-2xl hover:shadow-slate-900/20 transition-all duration-500">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-80 h-80 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
                    </div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mb-8">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <h2 class="text-white text-3xl md:text-4xl font-bold mb-3">Call Us</h2>
                        <p class="text-slate-400 leading-relaxed max-w-sm">Have a question or ready to start? Tap to call us directly.</p>
                    </div>
                    <div class="relative mt-8">
                        <p class="text-white text-2xl md:text-3xl font-bold tracking-wide">+254 757 896 465</p>
                        <p class="text-slate-500 text-sm mt-2">Tap to call</p>
                    </div>
                </a>

                {{-- WhatsApp card --}}
                <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20your%20properties." target="_blank" rel="noopener noreferrer" class="group relative bg-[#25D366] rounded-4xl overflow-hidden p-10 md:p-12 flex flex-col justify-between min-h-[320px] hover:shadow-2xl hover:shadow-[#25D366]/20 transition-all duration-500">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-80 h-80 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
                    </div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mb-8">
                            <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <h2 class="text-white text-3xl md:text-4xl font-bold mb-3">WhatsApp</h2>
                        <p class="text-white/70 leading-relaxed max-w-sm">Message us anytime. Quick responses, no waiting.</p>
                    </div>
                    <div class="relative mt-8">
                        <span class="inline-flex items-center gap-2 bg-white text-[#25D366] px-6 py-3 rounded-full font-bold hover:bg-white/90 transition-colors">
                            Chat on WhatsApp
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    {{-- Office location --}}
    <section class="py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-4xl border border-slate-100 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-10 md:p-12">
                        <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Visit Us</p>
                        <h2 class="font-display text-3xl md:text-4xl font-bold tracking-tight mb-6">Our Office</h2>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">Address</p>
                                    <p class="text-slate-500">Nairobi, Kenya</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">Email</p>
                                    <p class="text-slate-500">info@springreallty.com</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">Working Hours</p>
                                    <p class="text-slate-500">Mon - Sat: 8:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-100 min-h-[300px]">
                        <img src="https://images.unsplash.com/photo-1524813686514-a57563d77965?w=1200&h=800&fit=crop&q=85" alt="Nairobi skyline" loading="lazy" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="relative rounded-4xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=1600&h=500&fit=crop&q=85" alt="Luxury property" loading="lazy" class="w-full h-64 md:h-80 object-cover">
                <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight">Your Dream Home Is One Call Away</h2>
                    <p class="text-slate-300 max-w-lg mb-8">Let us help you find the perfect property. Reach out today and let's get started.</p>
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <a href="tel:+254757896465" class="bg-white text-slate-900 px-8 py-3.5 rounded-full font-semibold hover:bg-slate-100 transition-colors">
                            Call Now
                        </a>
                        <a href="https://wa.me/254757896465?text=Hi%20Spring%20Realty!%20I%27m%20interested%20in%20your%20properties." target="_blank" rel="noopener noreferrer" class="border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/10 transition-colors">
                            WhatsApp Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
