<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function __invoke(): View
    {
        $mainPhotosPaths = Storage::disk('images')->allFiles('main');
        unset($mainPhotosPaths[0]);

        return view('pages.main', compact('mainPhotosPaths'));
    }
}
