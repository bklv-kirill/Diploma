<?php

use Illuminate\Support\Facades\Route;

Route::name('password.')->middleware('guest')->group(function () {
    Route::get('/forgot-password', \App\Http\Controllers\Pages\User\Password\ForgotController::class)->name('forgot');
    Route::post('/forgot-password', \App\Http\Controllers\User\Password\SendResetLinkController::class)->name('send-reset-link');

    Route::get('/reset-password/{token}', \App\Http\Controllers\Pages\User\Password\ResetController::class)->name('reset');
    Route::post('/reset-password', \App\Http\Controllers\User\Password\UpdateController::class)->name('update');
});
