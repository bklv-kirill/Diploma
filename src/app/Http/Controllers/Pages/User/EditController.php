<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(): View
    {
        $user = auth()->user();

        return view('pages.user.edit', compact(['user']));
    }
}
