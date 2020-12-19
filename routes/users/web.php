<?php

use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Users\PostStatusController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, '__invoke'])
    ->name('dashboard');

Route::resource('posts', PostController::class);
Route::post('posts/{post}/status', PostStatusController::class)->name('posts.status');
