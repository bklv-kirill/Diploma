<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.main');
    }
}
