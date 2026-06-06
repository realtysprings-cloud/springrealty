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
    //  LOGIN FORM (email/password)
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

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if (!$user->isAdmin()) {
                Auth::logout();
                return back()->withErrors(['email' => 'You do not have admin access.']);
            }

            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    // ══════════════════════════════════════════════════════════════
    //  GOOGLE OAuth
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
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Google login failed. Please try again.']);
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

        // Only allow admin emails
        if (!$user->isAdmin()) {
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Your Google account does not have admin access.']);
        }

        Auth::login($user, true);
        $request = request();
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    // ══════════════════════════════════════════════════════════════
    //  LOGOUT
    // ══════════════════════════════════════════════════════════════

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
