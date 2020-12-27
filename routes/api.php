<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('checkNumber', [LoginController::class, 'checkNumber'])
        ->name('checkNumber');
    Route::post('login', [LoginController::class, 'Login'])
        ->name('login');

    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');
});
