<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __invoke(): View
    {
        $user = auth()->user();
        $employments = $user->employments;
        $charts = $user->charts;

        return view('pages.user.profile', compact(['user', 'employments', 'charts']));
    }
}
