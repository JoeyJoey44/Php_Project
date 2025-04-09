<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;

Route::post('/upload', [MediaController::class, 'upload']);
