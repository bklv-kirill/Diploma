<?php

use Illuminate\Support\Facades\Route;

Route::get('/cities', \App\Http\Controllers\Api\Search\City\IndexController::class);
Route::get('/universities', \App\Http\Controllers\Api\Search\University\IndexController::class);
Route::get('/collages', \App\Http\Controllers\Api\Search\Collages\IndexController::class);
Route::get('/softs', \App\Http\Controllers\Api\Search\Softs\IndexController::class);
Route::get('/hards', \App\Http\Controllers\Api\Search\Hard\IndexController::class);
Route::get('/applicants', \App\Http\Controllers\Api\Search\Applicant\IndexController::class);
