<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // ══════════════════════════════════════════════════════════════
    //  LOGIN (modal AJAX + standard POST)
    // ══════════════════════════════════════════════════════════════

    public function showLogin()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials, true)) {
            if ($request->expectsJson() || $request->isXmlHttpRequest()) {
                return response()->json(['message' => 'Invalid credentials.'], 422);
            }
            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        }

        $user = Auth::user();

        if (!$user->isAdmin()) {
            Auth::logout();
            $msg = 'You do not have admin access.';
            if ($request->expectsJson() || $request->isXmlHttpRequest()) {
                return response()->json(['message' => $msg], 422);
            }
            return back()->withErrors(['email' => $msg]);
        }

        $request->session()->regenerate();

        if ($request->expectsJson() || $request->isXmlHttpRequest()) {
            return response()->json(['redirect' => url('/')]);
        }

        return redirect()->intended('/');
    }

    // ══════════════════════════════════════════════════════════════
    //  GOOGLE OAuth (public — anyone can sign in)
    // ══════════════════════════════════════════════════════════════

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('home')
                ->withErrors(['error' => 'Google login failed. Please try again.']);
        }

        // Find or create user
        $user = User::where('google_id', $googleUser->getId())
                    ->orWhere('email', $googleUser->getEmail())
                    ->first();

        if ($user) {
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar'    => $googleUser->getAvatar(),
                'name'      => $user->name ?: $googleUser->getName(),
            ]);
        } else {
            $user = User::create([
                'name'      => $googleUser->getName(),
                'email'     => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar'    => $googleUser->getAvatar(),
                'password'  => null,
            ]);
        }

        Auth::login($user, true);
        request()->session()->regenerate();

        // If admin, go to admin panel. Otherwise, go home.
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('home');
    }

    // ══════════════════════════════════════════════════════════════
    //  LOGOUT
    // ══════════════════════════════════════════════════════════════

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
