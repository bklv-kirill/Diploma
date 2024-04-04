<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.user.login');
    }
}
