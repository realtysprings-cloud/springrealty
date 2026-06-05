<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($properties->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                @include('realestate.components.property-card', ['property' => $property])
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $properties->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-gray-600 text-xl">No properties found matching your criteria.</p>
            <a href="{{ route('properties.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">
                Clear filters
            </a>
        </div>
    @endif
</div>
