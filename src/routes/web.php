<?php

use Illuminate\Support\Facades\Route;

require_once 'user.php';
require_once 'password.php';

// TODO: Подумать над текстом сообщений для тостов.
// TODO: Подумать над текстом плейсхолдеров.

Route::get('/', \App\Http\Controllers\Pages\MainPageController::class)->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\User\EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::name('applicant.')->group(function () {
        Route::get('/applicants', \App\Http\Controllers\Pages\Applicant\IndexController::class)->name('index');
    });
});

Route::fallback(function () {
    abort(404);
});
