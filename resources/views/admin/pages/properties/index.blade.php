@extends('admin.layout.admin')

@section('title', 'Properties')
@section('page-title', 'Properties')

@section('content')
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <p class="text-sm text-slate-500">{{ $properties->total() }} properties total</p>
        </div>
        <a href="{{ route('admin.properties.create') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-full hover:bg-slate-800 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
            Add Property
        </a>
    </div>

    {{-- Filters --}}
    <form method="GET" class="bg-white rounded-2xl border border-slate-100 p-4 flex flex-col sm:flex-row items-stretch sm:items-center gap-3 mb-6">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search properties..."
               class="flex-1 bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-200 placeholder:text-slate-400">
        <select name="status" class="bg-slate-50 border-0 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-slate-200">
            <option value="">All Status</option>
            <option value="for_sale" {{ request('status') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
            <option value="for_rent" {{ request('status') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
            <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Sold</option>
        </select>
        <button type="submit" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-slate-800 transition-colors">Search</button>
    </form>

    {{-- Properties list --}}
    @if($properties->count() > 0)
        <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                            <th class="px-6 py-4">Property</th>
                            <th class="px-6 py-4 hidden sm:table-cell">Type</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 hidden md:table-cell">Price</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($properties as $property)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-11 h-11 rounded-xl overflow-hidden bg-slate-100 shrink-0">
                                            @if($property->images->first())
                                                <img src="{{ asset('storage/' . $property->images->first()->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold line-clamp-1">{{ $property->title }}</p>
                                            <p class="text-xs text-slate-400">{{ $property->city }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 hidden sm:table-cell">
                                    <span class="text-sm text-slate-600 capitalize">{{ $property->property_type }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold {{ $property->status === 'for_sale' ? 'bg-emerald-50 text-emerald-700' : ($property->status === 'for_rent' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-600') }}">
                                        {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    <span class="text-sm font-semibold">KES {{ number_format($property->price) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.properties.edit', $property) }}" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.properties.destroy', $property) }}" onsubmit="return confirm('Delete this property?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($properties->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $properties->links() }}
                </div>
            @endif
        </div>
    @else
        <div class="bg-white rounded-3xl border border-slate-100 p-16 text-center">
            <p class="text-slate-400 text-lg mb-4">No properties found.</p>
            <a href="{{ route('admin.properties.create') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-full hover:bg-slate-800 transition-colors">
                Add Your First Property
            </a>
        </div>
    @endif
@endsection
