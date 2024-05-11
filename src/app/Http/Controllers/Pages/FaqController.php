<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function __invoke(): View
    {
        $faqPhotosPaths = Storage::disk('images')->allFiles('faq');
        unset($faqPhotosPaths[0]);
        
        return view('pages.faq', compact('faqPhotosPaths'));
    }
}
