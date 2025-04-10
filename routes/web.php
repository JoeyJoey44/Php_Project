<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;



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

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/store', [UserController::class, 'store'])->name('users.store');

Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/update', [UserController::class, 'update'])->name('users.update');
Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
