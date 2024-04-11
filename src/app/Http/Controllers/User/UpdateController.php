<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoadUserAvatarIfExists;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user, LoadUserAvatarIfExists $loadUserAvatarIfExists): RedirectResponse
    {
        // TODO: Добвавить возможность удалить автатар, добавить номер телефона и изменить пароль.

        $userData = $request->validated();

        $loadUserAvatarIfExists($user, $userData['avatar'] ?? null);

        $user->employments()->sync($userData['employments'] ?? []);
        $user->charts()->sync($userData['charts'] ?? []);

        $user->update($userData);

        // TODO: Добвавить всплывающее окно с информацией о обновлении данных.

        return redirect()->route('user.profile', $user);
    }
}
