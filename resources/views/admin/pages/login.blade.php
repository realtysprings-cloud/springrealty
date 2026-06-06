<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Spring Realty Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        display: ['Playfair Display', 'serif'],
                    },
                    borderRadius: { '4xl': '2rem' }
                }
            }
        }
    </script>
</head>
<body class="bg-[#f5f3ef] text-slate-900 font-sans antialiased min-h-screen flex">

    {{-- Left: Image --}}
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1600&h=1200&fit=crop&q=85" alt="Luxury home" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-900/40"></div>
        <div class="absolute bottom-0 left-0 right-0 p-12">
            <p class="text-white/60 text-sm font-semibold uppercase tracking-widest mb-2">Spring Realty</p>
            <h2 class="text-white text-4xl font-display font-bold leading-tight">Manage Your<br>Properties</h2>
        </div>
    </div>

    {{-- Right: Login form --}}
    <div class="flex-1 flex items-center justify-center p-8">
        <div class="w-full max-w-sm">
            {{-- Mobile logo --}}
            <div class="lg:hidden flex items-center gap-3 mb-10">
                <div class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center">
                    <span class="text-white font-bold text-sm">SR</span>
                </div>
                <span class="text-lg font-bold">Spring Realty</span>
            </div>

            <h1 class="text-3xl font-bold mb-2">Welcome back</h1>
            <p class="text-slate-500 mb-8">Sign in to manage your properties.</p>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-5 py-3 rounded-2xl mb-6">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Google Sign In --}}
            <a href="{{ route('admin.auth.google') }}" class="flex items-center justify-center gap-3 w-full bg-white border border-slate-200 text-slate-700 py-3 rounded-full font-semibold hover:bg-slate-50 hover:border-slate-300 transition-all mb-6">
                <svg width="18" height="18" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Continue with Google
            </a>

            {{-- Divider --}}
            <div class="flex items-center gap-4 mb-6">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">or</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            {{-- Email/Password form --}}
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all placeholder:text-slate-400"
                           placeholder="you@example.com">
                </div>

                <div>
                    <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5 block">Password</label>
                    <input type="password" name="password" required
                           class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all placeholder:text-slate-400"
                           placeholder="Enter your password">
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="remember" value="1" id="remember" class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/10">
                    <label for="remember" class="text-sm text-slate-600">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-slate-900 text-white py-3 rounded-full font-semibold hover:bg-slate-800 transition-colors">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-slate-400 mt-8">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900 font-medium">&larr; Back to Spring Realty</a>
            </p>
        </div>
    </div>
</body>
</html>
