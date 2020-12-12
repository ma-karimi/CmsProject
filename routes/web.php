<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Authenticate\RegisterController;
use App\Http\Controllers\Authenticate\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::group(['prefix' => 'auth'],function(){

    Route::get('login', [LoginController::class, 'showLogin'])
        ->name('login');
    Route::post('authNum', [LoginController::class, 'authNum'])
        ->name('authNum');
    Route::post('login', [LoginController::class, 'Login'])
        ->name('login');

    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('register', [RegisterController::class, 'showRegister'])
        ->name('register');
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');
});

Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('dashboard', [PanelController::class])
        ->name('admin.dashboard');

    Route::get('users', [UserController::class,'index'])->name('admin.users');
});
