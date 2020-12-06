<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts');
Route::delete('posts/{post}/delete', [PostController::class, 'destroy'])
    ->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
