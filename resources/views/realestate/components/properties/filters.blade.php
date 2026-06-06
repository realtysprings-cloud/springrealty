@php
    $developments = ['Jabali Towers', 'Porini Point', 'NEXT Amani', '156 Elara', 'Kijani Ridge'];
    $unitTypes = ['studio', '1-bedroom', '2-bedroom', '3-bedroom', 'duplex', 'penthouse', 'townhouse', 'plot'];
@endphp

<div class="px-4 md:px-8 mb-10">
    <div class="max-w-7xl mx-auto">
        <form method="GET" action="{{ route('properties.index') }}" class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4 flex flex-col md:flex-row items-stretch md:items-center gap-4">
            <div class="flex-1">
                <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Development</label>
                <select name="type" class="w-full bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-slate-200 outline-none">
                    <option value="">All Developments</option>
                    @foreach($developments as $dev)
                        <option value="{{ $dev }}" {{ request('type') == $dev ? 'selected' : '' }}>{{ $dev }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Unit Type</label>
                <select name="unit_type" class="w-full bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-slate-200 outline-none">
                    <option value="">All Unit Types</option>
                    @foreach($unitTypes as $ut)
                        <option value="{{ $ut }}" {{ request('unit_type') == $ut ? 'selected' : '' }}>{{ ucfirst(str_replace('-', ' ', $ut)) }}</option>
                    @endforeach
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
            <div class="flex items-end">
                <button type="submit" class="w-full md:w-auto bg-slate-900 text-white px-8 py-2.5 rounded-xl text-sm font-semibold hover:bg-slate-800 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Search
                </button>
            </div>
        </form>
    </div>
</div>
