<?php

use Illuminate\Support\Facades\Route;

Route::get('/cities', \App\Http\Controllers\Api\Search\City\IndexController::class)->name('index');
Route::get('/universities', \App\Http\Controllers\Api\Search\University\IndexController::class)->name('index');
Route::get('/collages', \App\Http\Controllers\Api\Search\Collages\IndexController::class)->name('index');

