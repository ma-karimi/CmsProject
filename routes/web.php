<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
Route::post('/delete', [App\Http\Controllers\TestController::class, 'delete'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
