<?php

use Illuminate\Support\Facades\Route;

Route::get("/", \App\Http\Controllers\MainPageController::class)->name("main");
