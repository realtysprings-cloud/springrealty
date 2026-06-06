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
            <a href="{{ route('properties.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Properties</a>
            <a href="{{ route('contact') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            <a href="/login" class="hidden md:inline-flex text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Sign In</a>
            <a href="{{ route('properties.index') }}" class="hidden md:inline-flex items-center gap-2 bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-full hover:bg-slate-800 transition-colors">
                Get Started
            </a>
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
                <a href="{{ route('properties.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">Properties</a>
                <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-50 rounded-xl font-medium transition-colors">Contact</a>
            </nav>
        </div>
        <div class="p-6 border-t border-slate-100 space-y-3">
            <a href="/login" class="block w-full text-center text-slate-600 text-sm font-medium py-2 hover:text-slate-900 transition-colors">Sign In</a>
            <a href="{{ route('properties.index') }}" class="block w-full text-center bg-slate-900 text-white py-3 rounded-full font-semibold hover:bg-slate-800 transition-colors">Get Started</a>
        </div>
    </div>
</div>
