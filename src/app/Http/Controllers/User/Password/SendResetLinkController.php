<?php

namespace App\Http\Controllers\User\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Password\SendResetLinkRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class SendResetLinkController extends Controller
{
    public function __invoke(SendResetLinkRequest $request): RedirectResponse
    {
        $userData = $request->validated();

        $status = Password::sendResetLink($userData);

        if ($status !== Password::RESET_LINK_SENT)
            toastr()->error(__($status), 'Ошибка');
        else
            toastr()->info('На указанную почту были отправлены дальнешие инструкции для восстановление пароля', 'Уведомление');

        return redirect()->back();
    }
}
