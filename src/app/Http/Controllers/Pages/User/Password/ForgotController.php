<?php

namespace App\Http\Controllers\Pages\User\Password;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ForgotController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.user.password.forgot');
    }
}
