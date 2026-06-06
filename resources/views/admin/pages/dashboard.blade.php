@extends('admin.layout.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-3xl p-6 border border-slate-100">
            <p class="text-3xl font-bold">{{ $stats['total_properties'] }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Properties</p>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-slate-100">
            <p class="text-3xl font-bold text-emerald-600">{{ $stats['for_sale'] }}</p>
            <p class="text-sm text-slate-500 mt-1">For Sale</p>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-slate-100">
            <p class="text-3xl font-bold text-blue-600">{{ $stats['for_rent'] }}</p>
            <p class="text-sm text-slate-500 mt-1">For Rent</p>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-slate-100">
            <p class="text-3xl font-bold text-amber-600">{{ $stats['featured'] }}</p>
            <p class="text-sm text-slate-500 mt-1">Featured</p>
        </div>
    </div>

    {{-- Recent properties --}}
    <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between p-6 border-b border-slate-100">
            <h2 class="text-lg font-bold">Recent Properties</h2>
            <a href="{{ route('admin.properties.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">View All &rarr;</a>
        </div>

        @if($recentProperties->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                            <th class="px-6 py-4">Property</th>
                            <th class="px-6 py-4">Type</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($recentProperties as $property)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl overflow-hidden bg-slate-100 shrink-0">
                                            @if($property->images->first())
                                                <img src="{{ asset('storage/' . $property->images->first()->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-400">
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
                                <td class="px-6 py-4">
                                    <span class="text-sm text-slate-600 capitalize">{{ $property->property_type }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold {{ $property->status === 'for_sale' ? 'bg-emerald-50 text-emerald-700' : ($property->status === 'for_rent' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-600') }}">
                                        {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold">KES {{ number_format($property->price) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center">
                <p class="text-slate-400 mb-4">No properties yet.</p>
                <a href="{{ route('admin.properties.create') }}" class="inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-full hover:bg-slate-800 transition-colors">
                    Add Your First Property
                </a>
            </div>
        @endif
    </div>
@endsection
