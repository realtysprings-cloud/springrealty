<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealEstate\HomeController;
use App\Http\Controllers\RealEstate\PropertyController;
use App\Http\Controllers\RealEstate\SitemapController;
use App\Http\Controllers\admin\AuthController;

// ══════════════════════════════════════════════════════════════
//  PUBLIC AUTH — Login/Logout/Google (accessible by anyone)
// ══════════════════════════════════════════════════════════════
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/auth/google', [AuthController::class, 'googleRedirect'])->name('admin.auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])->name('admin.auth.google.callback');

// Alias: auth middleware expects a "login" named route for redirects
Route::get('/login', fn () => redirect()->route('home'))->name('login');

// ══════════════════════════════════════════════════════════════
//  PUBLIC REAL ESTATE ROUTES
// ══════════════════════════════════════════════════════════════
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/contact', function () {
    return view('realestate.pages.contact');
})->name('contact');
Route::get('/about', function () {
    return view('realestate.pages.about');
})->name('about');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
