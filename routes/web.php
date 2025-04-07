<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Welcome.blade.php Route
Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

// Features.blade.php Route
Route::get('/features', function () {
    return view('features');
})->name('features.index');

// Faq.blade.php Route
Route::get('/faq', function () {
    return view('faq');
})->name('faq.index');

// About.blade.php Route
Route::get('/about', function () {
    return view('about');
})->name('about.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
