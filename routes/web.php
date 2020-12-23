<?php


use App\Http\Controllers\Authenticate\RegisterController;
use App\Http\Controllers\Authenticate\LoginController;

use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\TagController;
use App\Http\Controllers\Users\DashboardController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('home', [HomeController::class, 'index'])
    ->name('home');
Route::get('home/{post}/show', [HomeController::class, 'show'])
    ->name('post');

Route::get('categories', [CategoryController::class, 'index'])
    ->name('categories');
Route::get('categories/{category}/show', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('tags', [TagController::class, 'index'])
    ->name('tags');
Route::get('tags/{tag}/show', [TagController::class, 'show'])
    ->name('tags.show');

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [LoginController::class, 'showLogin'])
        ->name('showLogin');
    Route::post('authNum', [LoginController::class, 'authNum'])
        ->name('authNum');
    Route::get('setPass', [LoginController::class, 'setPass'])
        ->name('setPass');
    Route::post('login', [LoginController::class, 'Login'])
        ->name('login');

    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('register', [RegisterController::class, 'showRegister'])
        ->name('register');
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');
});
