<?php

use Illuminate\Support\Facades\Route;

Route::name('search.')->group(function () {
    Route::name('cities.')->group(function () {
        Route::get('/cities', \App\Http\Controllers\Api\Search\City\IndexController::class)->name('index');
    });
});

Route::name('city.')->group(function () {
    Route::get('/cities/{city}', \App\Http\Controllers\Api\City\ShowController::class)->name('show');
});
