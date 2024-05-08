<?php

namespace App\Http\Controllers\User;

use App\Actions\User\LoadUserAvatarIfExistsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user, LoadUserAvatarIfExistsAction $loadUserAvatarIfExists): RedirectResponse
    {
        $userData = $request->validated();

        $userData['city_id'] = $userData['city_id'] ?? null;
        $userData['salary'] = $userData['salary'] ?? null;

        if (is_null($user->birthday))
            $userData['birthday'] = isset($userData['birthday']) ? Carbon::make($userData['birthday']) : null;

        $loadUserAvatarIfExists($user, $userData['avatar'] ?? null);

        $user->universities()->sync($userData['universities'] ?? []);
        $user->collages()->sync($userData['collages'] ?? []);
        $user->softs()->sync($userData['softs'] ?? []);
        $user->hards()->sync($userData['hards'] ?? []);
        $user->employments()->sync($userData['employments'] ?? []);
        $user->charts()->sync($userData['charts'] ?? []);

        if ($user->update($userData))
            toastr()->success('Данные успешно обновлены!', 'Отчет');

        return redirect()->route('user.profile', $user);
    }
}
