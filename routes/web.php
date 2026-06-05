<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealEstate\HomeController;
use App\Http\Controllers\RealEstate\PropertyController;

// Public RealEstate Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/contact', function () {
    return view('realestate.pages.contact');
})->name('contact');
