<?php

use Illuminate\Support\Facades\Route;

require_once 'user.php';
require_once 'password.php';

Route::get('/', \App\Http\Controllers\Pages\MainPageController::class)->name('main');
Route::get('/faq', \App\Http\Controllers\Pages\FaqController::class)->name('faq');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\User\EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');
});

Route::name('applicant.')->group(function () {
    Route::get('/applicants', \App\Http\Controllers\Pages\Applicant\IndexController::class)->name('index');
    Route::get('/applicants/{applicant}', \App\Http\Controllers\Pages\User\Applicants\ProfileController::class)->name('profile');
});

Route::fallback(function () {
    abort(404);
});
