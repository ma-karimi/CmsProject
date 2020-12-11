<?php

use App\Http\Controllers\Authenticate\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


});

Route::group(['prefix' => 'panel'],function(){
    Route::get('dashboard', [PanelController::class, 'index'])
        ->name('panel.dashboard');
});
