<?php

namespace App\Http\Controllers\Pages\Vacancy;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(): View
    {
        return view('pages.vacancy.index');
    }

}
