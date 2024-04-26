<?php

use Illuminate\Support\Facades\Route;

Route::name('search.')->group(function () {
    Route::get('/cities', \App\Http\Controllers\Api\Search\City\IndexController::class)->name('cities');
});
