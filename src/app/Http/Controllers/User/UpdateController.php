<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, User $user): RedirectResponse
    {
        $userData = $request->validated();

        $avatar = isset($userData['avatar']) ? Storage::disk('images')->put('', $userData['avatar']) : null;

        $user->update([
            'about' => $userData['about'],
        ]);

        return redirect()->route('user.profile', $user);
    }
}
