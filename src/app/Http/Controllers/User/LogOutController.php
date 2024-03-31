<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
