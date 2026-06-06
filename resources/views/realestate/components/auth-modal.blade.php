{{-- Auth Modal --}}
<div id="auth-modal" class="hidden fixed inset-0 z-[80]" role="dialog">
    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeAuthModal()"></div>

    {{-- Modal --}}
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden" onclick="event.stopPropagation()">

            {{-- Close --}}
            <button onclick="closeAuthModal()" class="absolute top-4 right-4 p-2 text-slate-400 hover:text-slate-700 rounded-full hover:bg-slate-100 transition-colors z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            {{-- Header image --}}
            <div class="h-32 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=600&h=300&fit=crop&q=80" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-4 left-6">
                    <p class="text-white text-lg font-bold">Welcome to Spring Realty</p>
                </div>
            </div>

            {{-- Body --}}
            <div class="p-6">
                {{-- Sign in form --}}
                <div id="auth-signin">
                    {{-- Google --}}
                    <a href="{{ route('admin.auth.google') }}" class="flex items-center justify-center gap-3 w-full bg-white border border-slate-200 text-slate-700 py-3 rounded-full font-semibold hover:bg-slate-50 hover:border-slate-300 transition-all">
                        <svg width="18" height="18" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Continue with Google
                    </a>

                    {{-- Divider --}}
                    <div class="flex items-center gap-4 my-5">
                        <div class="flex-1 h-px bg-slate-200"></div>
                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">or</span>
                        <div class="flex-1 h-px bg-slate-200"></div>
                    </div>

                    {{-- Email form --}}
                    <form id="auth-email-form" onsubmit="return handleLogin(event)">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <input type="email" name="email" required placeholder="Email address"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <input type="password" name="password" required placeholder="Password"
                                       class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3 text-sm outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all placeholder:text-slate-400">
                            </div>
                        </div>
                        <div id="auth-error" class="hidden bg-red-50 text-red-600 text-sm px-4 py-2.5 rounded-xl mt-4"></div>
                        <button type="submit" id="auth-submit-btn" class="w-full bg-slate-900 text-white py-3 rounded-full font-semibold hover:bg-slate-800 transition-colors mt-4">
                            Sign In
                        </button>
                    </form>
                </div>

                <p class="text-center text-xs text-slate-400 mt-5">
                    By continuing, you agree to our Terms of Service.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function openAuthModal() {
        document.getElementById('auth-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAuthModal() {
        document.getElementById('auth-modal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    function handleLogin(e) {
        e.preventDefault();
        const form = e.target;
        const btn = document.getElementById('auth-submit-btn');
        const errorDiv = document.getElementById('auth-error');
        const formData = new FormData(form);

        btn.disabled = true;
        btn.textContent = 'Signing in...';
        errorDiv.classList.add('hidden');

        fetch('{{ route("admin.login") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(r => r.json().then(data => ({ ok: r.ok, data })))
        .then(({ ok, data }) => {
            if (ok && data.redirect) {
                window.location.href = data.redirect;
            } else {
                errorDiv.textContent = data.message || 'Invalid credentials.';
                errorDiv.classList.remove('hidden');
            }
        })
        .catch(() => {
            errorDiv.textContent = 'Something went wrong. Please try again.';
            errorDiv.classList.remove('hidden');
        })
        .finally(() => {
            btn.disabled = false;
            btn.textContent = 'Sign In';
        });

        return false;
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeAuthModal();
    });
</script>
