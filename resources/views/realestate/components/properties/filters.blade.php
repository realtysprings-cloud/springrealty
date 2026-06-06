<div class="px-4 md:px-8 mb-10">
    <div class="max-w-7xl mx-auto">
        <form method="GET" action="{{ route('properties.index') }}" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4 flex flex-col md:flex-row items-stretch md:items-center gap-4">
            <div class="flex-1">
                <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Property Type</label>
                <select name="type" class="w-full bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-slate-200 outline-none">
                    <option value="">All Types</option>
                    <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>House</option>
                    <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="condo" {{ request('type') == 'condo' ? 'selected' : '' }}>Condo</option>
                    <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Land</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Status</label>
                <select name="status" class="w-full bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-slate-200 outline-none">
                    <option value="">All Status</option>
                    <option value="for_sale" {{ request('status') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                    <option value="for_rent" {{ request('status') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">City</label>
                <input type="text" name="city" value="{{ request('city') }}" placeholder="Enter city..." class="w-full bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-slate-200 outline-none placeholder:text-slate-400">
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full md:w-auto bg-slate-900 text-white px-8 py-2.5 rounded-xl text-sm font-semibold hover:bg-slate-800 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Search
                </button>
            </div>
        </form>
    </div>
</div>
