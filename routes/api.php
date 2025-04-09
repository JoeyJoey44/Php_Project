<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SumarizedController;
use App\Http\Controllers\SummaryController;

Route::post('/upload', [MediaController::class, 'upload']);

// Public routes (no authentication needed)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (require valid JWT token)
Route::middleware('auth:api')->group(function () {
    // Authentication
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user', [AuthController::class, 'user']);

    // User management
    Route::apiResource('users', UserController::class);

    // Summarization (DeepSeek)
    Route::post('/summarize', [SumarizedController::class, 'summarize']);

    // Summary storage (DB)
    Route::apiResource('summaries', SummaryController::class);
    Route::get('/summaries', [SummaryController::class, 'index']);
    Route::post('/summaries', [SummaryController::class, 'store']);
});
