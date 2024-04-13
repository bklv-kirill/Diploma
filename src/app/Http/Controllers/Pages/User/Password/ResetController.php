<?php

namespace App\Http\Controllers\Pages\User\Password;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ResetController extends Controller
{
    public function __invoke(string $token): View
    {
        return view('pages.user.password.reset', compact('token'));
    }
}
