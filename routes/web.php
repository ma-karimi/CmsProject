<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [LoginController::class, 'showLogin'])
        ->name('showLogin');
    Route::post('checkNumber', [LoginController::class, 'checkNumber'])
        ->name('checkNumber');
    Route::get('getPassword', [LoginController::class, 'getPassword'])
        ->name('getPassword');
    Route::post('login', [LoginController::class, 'Login'])
        ->name('login');

    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('register', [RegisterController::class, 'showRegister'])
        ->name('register');
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');
});

Route::group(['prefix' => 'users'], function () {

    Route::get('dashboard', [DashboardController::class, '__invoke'])
        ->name('users.dashboard');
});
