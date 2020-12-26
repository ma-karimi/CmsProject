<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Posts\PostController;

use App\Http\Controllers\Posts\PostStatusController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserStatusController;

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

    Route::resource('users', UserController::class)->except('create', 'store');
    Route::post('status/{user}', [UserStatusController::class, 'status'])
        ->name('users.status');
    Route::post('role/{user}', [UserStatusController::class, 'roles'])
        ->name('users.role');
    Route::post('permission/{user}', [UserStatusController::class, 'permissions'])
        ->name('users.permission');
});

Route::group(['prefix' => 'posts'], function (){
    Route::resource('posts', PostController::class);
    Route::post('posts/status/{post}', [PostStatusController::class,'status'])
        ->name('posts.status');
    Route::post('posts/restore/{post}', [PostStatusController::class,'restore'])
        ->name('posts.restore');
    Route::post('posts/terminate/{post}', [PostStatusController::class,'terminate'])
        ->name('posts.terminate');
});
