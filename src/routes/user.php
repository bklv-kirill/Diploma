<?php

use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', \App\Http\Controllers\Pages\User\LoginController::class)->name('login');
        Route::post('/login', \App\Http\Controllers\User\AuthController::class)->name('auth');

        Route::get('/register', \App\Http\Controllers\Pages\User\RegisterController::class)->name('register');
        Route::post('/register', \App\Http\Controllers\User\StoreController::class)->name('store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', \App\Http\Controllers\Pages\User\ProfileController::class)->name('profile');
        Route::get('/profile/edit', \App\Http\Controllers\Pages\User\EditController::class)->name('edit');

        Route::patch('/profile/edit/{user}', \App\Http\Controllers\User\UpdateController::class)->name('update');

        Route::get('/log-out', \App\Http\Controllers\User\LogOutController::class)->name('log-out');
        Route::delete('/profile/{user}', \App\Http\Controllers\User\DeleteController::class)->name('delete');

        Route::name('password.')->group(function () {
            Route::get('/profile/edit/password', \App\Http\Controllers\Pages\User\Password\EditController::class)->name('edit');
            Route::post('/profile/edit/password', \App\Http\Controllers\User\Password\EditController::class)->name('update');
        });
    });
});
