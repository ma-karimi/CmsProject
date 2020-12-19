<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostStatusController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\UserStatusController;
use App\Http\Controllers\Authenticate\RegisterController;
use App\Http\Controllers\Authenticate\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

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

Route::group(['middleware' => ['web', 'role:admin'], 'prefix' => 'admin'], function () {

    Route::get('dashboard', [PanelController::class, '__invoke'])
        ->name('admin.dashboard');

    Route::resource('users', UserController::class)
        ->only('index', 'show', 'destroy');
    Route::post('users/{user}/status', UserStatusController::class)
        ->name('users.status');

    Route::resource('posts', PostController::class)
        ->only('index', 'show', 'destroy');
    Route::post('posts/{post}/status', PostStatusController::class)
        ->name('posts.status');

    Route::resource('tags', TagController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
});

