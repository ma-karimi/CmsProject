<?php

use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Users\RestoreController;
use App\Http\Controllers\Users\TerminateController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', [DashboardController::class,'__invoke'])
    ->name('dashboard');

Route::resource('posts', PostController::class);
Route::post('posts/{post}/restore', RestoreController::class)->name('posts.restore');
Route::post('posts/{post}/terminate', TerminateController::class)->name('posts.terminate');
