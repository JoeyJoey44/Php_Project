<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\SummaryAdminController;


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
    Route::get('/summaries', [SummaryAdminController::class, 'index'])->name('admin.summaries.index');
    Route::get('/summaries/{id}', [SummaryAdminController::class, 'show'])->name('admin.summaries.show');
    Route::get('/stream-video/{filename}', [SummaryAdminController::class, 'streamVideo'])
        ->where('filename', '.*') // allow dots in the filename
        ->name('admin.video.stream');
        
    Route::get('/dashboard', function () {
        return view('dashboard'); // or redirect()->route('users.index') if preferred
    })->name('dashboard')->middleware('auth');
});

require __DIR__ . '/auth.php';
