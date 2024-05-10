<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        $user = auth()->user();

        return $user->hasRole('Соискатель') ?
            view('pages.user.profile', compact(['user'])) :
            redirect()->route('platform.main');
    }
}
