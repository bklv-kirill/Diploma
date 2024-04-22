<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoadUserAvatarIfExistsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user, LoadUserAvatarIfExistsAction $loadUserAvatarIfExists): RedirectResponse
    {
        $userData = $request->validated();

        $loadUserAvatarIfExists($user, $userData['avatar'] ?? null);

        $user->employments()->sync($userData['employments'] ?? []);
        $user->charts()->sync($userData['charts'] ?? []);

        if ($user->update($userData))
            toastr()->success('Данные успешно обновлены!', 'Отчет');

        return redirect()->route('user.profile', $user);
    }
}
