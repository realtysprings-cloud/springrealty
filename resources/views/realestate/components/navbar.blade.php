<nav class="fixed top-0 left-0 right-0 z-50 px-4 py-4 md:px-8">
    <div class="max-w-7xl mx-auto bg-white/80 backdrop-blur-xl rounded-2xl shadow-sm border border-white/50 px-6 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center">
                <span class="text-white font-bold text-sm tracking-tight">SR</span>
            </div>
            <span class="text-lg font-bold tracking-tight hidden sm:block">Spring Realty</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Home</a>
            <div class="relative" id="developments-wrapper">
                <button onclick="toggleDevelopments()" class="flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">
                    Developments
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="developments-dropdown" class="hidden absolute left-0 top-10 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 w-56 z-50">
                    <a href="{{ route('properties.index', ['development' => 'Jabali Towers']) }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                        <span class="font-medium">Jabali Towers</span>
                        <span class="block text-xs text-slate-400 mt-0.5">Luxury Apartments & Penthouses</span>
                    </a>
                    <a href="{{ route('properties.index', ['development' => 'Porini Point']) }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                        <span class="font-medium">Porini Point</span>
                        <span class="block text-xs text-slate-400 mt-0.5">Safari-Inspired Living</span>
                    </a>
                    <a href="{{ route('properties.index', ['development' => 'NEXT Amani']) }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                        <span class="font-medium">NEXT Amani</span>
                        <span class="block text-xs text-slate-400 mt-0.5">Modern Apartments</span>
                    </a>
                    <a href="{{ route('properties.index', ['development' => '156 Elara']) }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                        <span class="font-medium">156 Elara</span>
                        <span class="block text-xs text-slate-400 mt-0.5">Exclusive Townhouses</span>
                    </a>
                    <a href="{{ route('properties.index', ['development' => 'Kijani Ridge']) }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                        <span class="font-medium">Kijani Ridge</span>
                        <span class="block text-xs text-slate-400 mt-0.5">Premium Villas</span>
                    </a>
                    <div class="border-t border-slate-100 mt-1 pt-1">
                        <a href="{{ route('properties.index') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">All Properties</a>
                    </div>
                </div>
            </div>
            <a href="{{ route('about') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">About</a>
            <a href="{{ route('contact') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="hidden md:inline-flex text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Admin Panel</a>
                @endif
                <div class="relative" id="user-menu-wrapper">
                    <button onclick="toggleUserMenu()" class="flex items-center gap-2">
                        @if(auth()->user()->avatar)
                            <img src="{{ auth()->user()->avatar }}" alt="" class="w-9 h-9 rounded-full object-cover border-2 border-slate-200">
                        @else
                            <div class="w-9 h-9 bg-slate-900 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </button>
                    <div id="user-menu" class="hidden absolute right-0 top-12 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 w-56 z-50">
                        <div class="px-4 py-3 border-b border-slate-100">
                            <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-slate-400">{{ auth()->user()->email }}</p>
                        </div>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/></svg>
                                Admin Panel
                            </a>
                        @endif
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <button onclick="openAuthModal()" class="hidden md:inline-flex text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Sign In</button>
                <button onclick="openAuthModal()" class="bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-full hover:bg-slate-800 transition-colors">
                    Get Started
                </button>
            @endauth

            <button id="mobile-menu-button" class="md:hidden p-2 text-slate-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</nav>

<div id="mobile-overlay" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40 md:hidden"></div>

<div id="mobile-sidebar" class="fixed top-0 left-0 h-full w-80 bg-white shadow-2xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-between p-6 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center">
                    <span class="text-white font-bold text-sm">SR</span>
                </div>
                <span class="text-lg font-bold">Spring Realty</span>
            </div>
            <button id="close-sidebar" class="p-2 text-slate-400 hover:text-slate-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="flex-1 p-6">
            <nav class="space-y-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">Home</a>
                <a href="{{ route('properties.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">All Properties</a>
                <div class="px-4 pt-3 pb-1">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Developments</p>
                </div>
                <a href="{{ route('properties.index', ['development' => 'Jabali Towers']) }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm transition-colors">Jabali Towers</a>
                <a href="{{ route('properties.index', ['development' => 'Porini Point']) }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm transition-colors">Porini Point</a>
                <a href="{{ route('properties.index', ['development' => 'NEXT Amani']) }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm transition-colors">NEXT Amani</a>
                <a href="{{ route('properties.index', ['development' => '156 Elara']) }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm transition-colors">156 Elara</a>
                <a href="{{ route('properties.index', ['development' => 'Kijani Ridge']) }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-600 hover:bg-slate-50 rounded-xl text-sm transition-colors">Kijani Ridge</a>
                <a href="{{ route('about') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">About</a>
                <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">Contact</a>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">Admin Panel</a>
                    @endif
                @endauth
            </nav>
        </div>
        <div class="p-6 border-t border-slate-100 space-y-3">
            @auth
                <div class="flex items-center gap-3 px-4 py-2">
                    @if(auth()->user()->avatar)
                        <img src="{{ auth()->user()->avatar }}" alt="" class="w-9 h-9 rounded-full object-cover">
                    @else
                        <div class="w-9 h-9 bg-slate-900 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                    @endif
                    <div>
                        <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-center text-slate-500 text-sm font-medium py-2 hover:text-slate-900 transition-colors">Sign Out</button>
                </form>
            @else
                <button onclick="openAuthModal(); closeSidebarFunc();" class="block w-full text-center text-slate-600 text-sm font-medium py-2 hover:text-slate-900 transition-colors">Sign In</button>
                <button onclick="openAuthModal(); closeSidebarFunc();" class="block w-full bg-slate-900 text-white py-3 rounded-full font-semibold hover:bg-slate-800 transition-colors">Get Started</button>
            @endauth
        </div>
    </div>
</div>

<script>
    function toggleUserMenu() {
        document.getElementById('user-menu').classList.toggle('hidden');
    }
    function toggleDevelopments() {
        document.getElementById('developments-dropdown').classList.toggle('hidden');
    }
    document.addEventListener('click', (e) => {
        const userWrapper = document.getElementById('user-menu-wrapper');
        const devWrapper = document.getElementById('developments-wrapper');
        if (userWrapper && !userWrapper.contains(e.target)) {
            document.getElementById('user-menu').classList.add('hidden');
        }
        if (devWrapper && !devWrapper.contains(e.target)) {
            document.getElementById('developments-dropdown').classList.add('hidden');
        }
    });
</script>
