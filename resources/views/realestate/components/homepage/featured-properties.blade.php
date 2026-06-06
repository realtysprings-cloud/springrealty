<section class="py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-2">Featured Listings</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold tracking-tight">Premium Properties</h2>
            </div>
            <a href="{{ route('properties.index') }}" class="hidden md:inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-6 py-3 rounded-full hover:bg-slate-800 transition-colors">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        @if($properties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($properties as $index => $property)
                    @if($index === 0)
                        <div class="md:col-span-2 lg:row-span-2">
                            @include('realestate.components.property-card', ['property' => $property, 'large' => true])
                        </div>
                    @else
                        @include('realestate.components.property-card', ['property' => $property, 'large' => false])
                    @endif
                @endforeach
            </div>

            <div class="mt-8 text-center md:hidden">
                <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-6 py-3 rounded-full hover:bg-slate-800 transition-colors">
                    View All Properties
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-4xl border border-slate-100">
                <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                <p class="text-slate-500 text-lg">No properties available yet.</p>
            </div>
        @endif
    </div>
</section>
