<div class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <form method="GET" action="{{ route('properties.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Property Type Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Property Type</label>
                <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">All Types</option>
                    <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>House</option>
                    <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="condo" {{ request('type') == 'condo' ? 'selected' : '' }}>Condo</option>
                    <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Land</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">All Status</option>
                    <option value="for_sale" {{ request('status') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                    <option value="for_rent" {{ request('status') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                </select>
            </div>

            <!-- City Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                <input type="text" 
                       name="city" 
                       value="{{ request('city') }}"
                       placeholder="Enter city"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>

            <!-- Search Button -->
            <div class="flex items-end">
                <button type="submit" 
                        class="w-full bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Search
                </button>
            </div>
        </form>
    </div>
</div>
