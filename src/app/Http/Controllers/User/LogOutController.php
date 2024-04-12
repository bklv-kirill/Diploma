<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->regenerate();

        return redirect()->route('user.login');
    }
}
