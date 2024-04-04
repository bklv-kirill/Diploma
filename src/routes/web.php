<?php

use Illuminate\Support\Facades\Route;

require_once 'user.php';

Route::get('/', \App\Http\Controllers\Pages\MainPageController::class)->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\User\EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');
});
