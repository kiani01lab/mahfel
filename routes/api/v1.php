<?php

use Illuminate\Support\Facades\Route;

/**
 * User Endpoints
 */
Route::group([
    'prefix' => 'users',
    'as' => 'users:',
    'middleware' => 'auth:sanctum',
], function (){
    Route::get(
        '/{user}',
        action: \App\Http\Controllers\Api\V1\User\ShowController::class,
    )->name('show');
});

/**
 * Thread Endpoints
 */
Route::group([
    'prefix' => 'threads',
    'as' => 'threads:',
    'middleware' => 'auth:sanctum'
], function () {
    Route::get(
        '',
        action: \App\Http\Controllers\Api\V1\Threads\IndexController::class
    )->name('index');

    Route::get(
        '/{thread}',
        action: \App\Http\Controllers\Api\V1\Threads\ShowController::class
    )->name('show');

    Route::post(
        '',
        action: \App\Http\Controllers\Api\V1\Threads\StoreController::class
    )->name('store');
});
