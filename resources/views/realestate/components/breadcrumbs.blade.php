@php
    $breadcrumbs = $breadcrumbs ?? [];
@endphp

@if(count($breadcrumbs) > 0)
    <nav class="max-w-7xl mx-auto px-4 md:px-8 pt-24 pb-2" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-sm text-slate-400">
            <li><a href="{{ route('home') }}" class="hover:text-slate-600 transition-colors">Home</a></li>
            @foreach($breadcrumbs as $label => $url)
                <li class="flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    @if($loop->last)
                        <span class="text-slate-600 font-medium">{{ $label }}</span>
                    @else
                        <a href="{{ $url }}" class="hover:text-slate-600 transition-colors">{{ $label }}</a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
