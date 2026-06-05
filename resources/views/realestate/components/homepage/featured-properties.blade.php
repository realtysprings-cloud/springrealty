<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Featured Properties</h2>
    
    @if($properties->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                @include('realestate.components.property-card', ['property' => $property])
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-gray-600 text-xl">No properties available at the moment.</p>
        </div>
    @endif
</div>
