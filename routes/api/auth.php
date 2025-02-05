<?php

use Illuminate\Support\Facades\Route;

/**
 * Authentication Endpoints
 */

Route::group(['as' => 'auth:'], function () {
    Route::post(
        'login',
        action:\App\Http\Controllers\Api\Auth\LoginController::class
    )->name('login');

    Route::post(
        'register',
        action:\App\Http\Controllers\Api\Auth\RegisterController::class
    )->name('register');

    Route::post(
        'logout',
        action:\App\Http\Controllers\Api\Auth\LogoutController::class
    )
        ->middleware('auth:sanctum')
        ->name('logout');
});

