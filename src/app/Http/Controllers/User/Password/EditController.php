<?php

namespace App\Http\Controllers\User\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Password\EditRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
    public function __invoke(EditRequest $request): RedirectResponse
    {
        $passwordData = $request->validated();

        $user = auth()->user();

        if (!Hash::check($passwordData['old_password'], $user->password))
            return redirect()->back()->withErrors(['old_password' => 'Введенный пароль не совпадает с актуальным']);

        if ($user->update(['password' => $passwordData['new_password']]))
            toastr()->success('Пароль был успешно обновлен', 'Отчет');

        return redirect()->route('user.edit');
    }
}
