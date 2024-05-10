<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __invoke(AuthRequest $request): RedirectResponse
    {
        $userData = $request->validated();

        if (auth()->attempt([
            'email' => $userData['email'],
            'password' => $userData['password']
        ], isset($userData['remember_me']))) {
            $request->session()->regenerate();

            $user = auth()->user();

            if (is_null($user->email_verified_at))
                toastr()->info('Для доступа к полному функционалу сайта вам небходимо подтвердить Email адрес', 'Уведомление');
            return redirect()->route('main');
        }

        return back()->withErrors([
            'password' => 'Неверный пароль.',
        ])->withInput([
            'email' => $userData['email'],
        ]);
    }
}
