<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.user.register');
    }
}
