<?php

namespace App\Http\Controllers\Pages\User\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        $user = auth()->user();

        if (is_null($user->email_verified_at))
            return redirect()->back();

        return view('pages.user.password.edit');
    }
}
