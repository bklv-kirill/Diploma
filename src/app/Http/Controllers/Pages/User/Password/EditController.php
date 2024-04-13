<?php

namespace App\Http\Controllers\Pages\User\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        if (Gate::denies('email-verified'))
            return redirect()->back();

        return view('pages.user.password.edit');
    }
}
