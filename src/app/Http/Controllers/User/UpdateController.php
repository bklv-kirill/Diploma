<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoadUserAvatarIfExists;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, User $user, LoadUserAvatarIfExists $loadUserAvatarIfExists): RedirectResponse
    {
        $userData = $request->validated();

        if (isset($userData['avatar']))
            $loadUserAvatarIfExists($user, $userData['avatar']);

        $user->update([
            'about' => $userData['about'],
        ]);

        return redirect()->route('user.profile', $user);
    }
}
