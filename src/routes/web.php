<?php

use Illuminate\Support\Facades\Route;

require_once 'user.php';
require_once 'password.php';

// TODO: Подумать над текстом сообщений для тостов.
// TODO: Подумать над текстом плейсхолдеров.
// TODO: Провести рефактор SCSS файлов.
// TODO: Провести рефактор Blade страниц.
// TODO: Создать и внедрить Laravel компоненты где это необходимо.

Route::get('/', \App\Http\Controllers\Pages\MainPageController::class)->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\User\EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');
});

Route::fallback(function () {
    abort(404);
});
