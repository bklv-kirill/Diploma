<?php

namespace App\Http\Controllers\Pages\User\Applicants;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __invoke(Request $request, User $applicant): View|RedirectResponse
    {
        $user = $applicant;
        $isApplicant = true;

        if (!$user->hasRole('Соискатель') || $user->id === auth()->user()->id)
            return redirect()->route('main');

        return view('pages.user.profile', compact('user', 'isApplicant'));
    }
}
