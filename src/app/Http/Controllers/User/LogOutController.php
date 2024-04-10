<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LogOutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('user.login');
    }
}
