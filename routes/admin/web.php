<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostStatusController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserStatusController;

use Illuminate\Support\Facades\Route;


Route::get('dashboard', [PanelController::class, '__invoke'])
    ->name('admin.dashboard');

Route::resource('users', UserController::class)
    ->only('index', 'show', 'destroy');
Route::post('users/{user}/status', [UserStatusController::class, '__invoke'])
    ->name('users.status');

Route::resource('posts', PostController::class)
    ->only('index', 'show', 'destroy');
Route::post('posts/{post}/status', PostStatusController::class)
    ->name('posts.status');

Route::resource('tags', TagController::class)
    ->except('show');
Route::resource('categories', CategoryController::class)
    ->except('show');

