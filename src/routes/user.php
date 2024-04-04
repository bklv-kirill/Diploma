<?php

use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', \App\Http\Controllers\Pages\User\LoginController::class)->name('login');
        Route::get('/register', \App\Http\Controllers\Pages\User\RegisterController::class)->name('register');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/profile', \App\Http\Controllers\Pages\User\ProfileController::class)->name('profile');
    });

    Route::post('/login', \App\Http\Controllers\User\AuthController::class)->name('auth');
    Route::post('/register', \App\Http\Controllers\User\StoreController::class)->name('store');

    Route::get('/log-out', \App\Http\Controllers\User\LogOutController::class)->name('log-out');
});
