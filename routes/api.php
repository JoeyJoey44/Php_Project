<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\SummaryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Media upload
Route::post('/upload', [MediaController::class, 'upload']);

// Protected routes (JWT)
Route::middleware('auth:api')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user', [AuthController::class, 'user']);
    // Summaries (resource routes for authenticated user)
    Route::get('/summaries-list', [SummaryController::class, 'index']);

    // Optional extra endpoints

});
