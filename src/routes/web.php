<?php

use Illuminate\Support\Facades\Route;

require_once 'user.php';
require_once 'password.php';

// TODO: Подумать над текстом сообщений для тостов.
// TODO: Подумать над текстом плейсхолдеров.
// TODO: Переписать условия на !is_null().
// TODO: Поменять название таблицы role_users.

Route::get('/', \App\Http\Controllers\Pages\MainPageController::class)->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\User\EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::name('applicant.')->middleware('isEmployer')->group(function () {
        Route::get('/applicants', \App\Http\Controllers\Pages\Applicant\IndexController::class)->name('index');
        Route::get('/applicants/{applicant}', \App\Http\Controllers\Pages\User\Applicants\ProfileController::class)->name('profile');
    });
});

Route::fallback(function () {
    abort(404);
});
