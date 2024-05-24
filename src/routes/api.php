<?php

use Illuminate\Support\Facades\Route;

Route::get('/cities',
    \App\Http\Controllers\Api\Search\City\IndexController::class);
Route::get('/universities',
    \App\Http\Controllers\Api\Search\University\IndexController::class);
Route::get('/collages',
    \App\Http\Controllers\Api\Search\Collages\IndexController::class);
Route::get('/softs',
    \App\Http\Controllers\Api\Search\Softs\IndexController::class);
Route::get('/hards',
    \App\Http\Controllers\Api\Search\Hard\IndexController::class);
Route::get('/applicants',
    \App\Http\Controllers\Api\Search\Applicant\IndexController::class);
Route::get('/vacancies',
    \App\Http\Controllers\Api\Search\Vacancy\IndexController::class);

Route::prefix('/responses')->name('response.')->group(function () {
    Route::post('/store',
        \App\Http\Controllers\Api\Response\StoreController::class)
        ->name('store');
    Route::delete('/delete',
        \App\Http\Controllers\Api\Response\DeleteController::class)
        ->name('delete');
});
