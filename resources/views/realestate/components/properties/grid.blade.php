<div class="px-4 md:px-8 pb-16">
    <div class="max-w-7xl mx-auto">
        @if($properties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($properties as $property)
                    @include('realestate.components.property-card', ['property' => $property, 'large' => false])
                @endforeach
            </div>

            <div class="mt-12">
                {{ $properties->links() }}
            </div>
        @else
            <div class="text-center py-24 bg-white rounded-3xl border border-slate-100">
                <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <p class="text-slate-500 text-lg mb-4">No properties found matching your criteria.</p>
                <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-6 py-3 rounded-full hover:bg-slate-800 transition-colors">
                    Clear Filters
                </a>
            </div>
        @endif
    </div>
</div>
