<?php

namespace App\Http\Controllers\User\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Password\UpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request): RedirectResponse
    {
        $passwordData = $request->validated();

        $status = Password::reset(
            $passwordData,
            function (User $user, string $password) {
                $user->forceFill(['password' => $password])
                    ->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status !== Password::PASSWORD_RESET) {
            toastr()->error(__($status), 'Ошибка');
            return redirect()->back();
        }

        toastr()->success(__($status), 'Уведомление');
        return redirect()->route('user.login');
    }
}
