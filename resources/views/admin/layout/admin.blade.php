<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Spring Realty</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['DM Sans', 'sans-serif'] },
                    borderRadius: { '4xl': '2rem' }
                }
            }
        }
    </script>
    <style>
        * { -webkit-font-smoothing: antialiased; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#f5f3ef] text-slate-900 font-sans antialiased">

    {{-- Mobile overlay --}}
    <div id="sidebar-overlay" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40 lg:hidden" onclick="toggleSidebar()"></div>

    {{-- Sidebar --}}
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-72 bg-white border-r border-slate-100 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="flex flex-col h-full">
            {{-- Logo --}}
            <div class="p-6 border-b border-slate-100">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SR</span>
                    </div>
                    <div>
                        <span class="text-sm font-bold block leading-tight">Spring Realty</span>
                        <span class="text-[11px] text-slate-400 font-medium">Admin Panel</span>
                    </div>
                </a>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 p-4 space-y-1 scrollbar-hide overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.properties.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.properties.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Properties
                </a>
            </nav>

            {{-- Footer --}}
            <div class="p-4 border-t border-slate-100 space-y-2">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Back to Site
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="lg:ml-72 min-h-screen">
        {{-- Top bar --}}
        <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-xl border-b border-slate-100">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="lg:hidden p-2 text-slate-600 hover:text-slate-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h1 class="text-lg font-bold">@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-slate-500 hidden sm:block">{{ auth()->user()->name }}</span>
                    <div class="w-9 h-9 bg-slate-900 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="mx-6 mt-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-5 py-3 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mx-6 mt-4 bg-red-50 border border-red-200 text-red-700 text-sm px-5 py-3 rounded-2xl">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Page content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
    @yield('scripts')
</body>
</html>
