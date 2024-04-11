<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Request $request, User $user): RedirectResponse
    {
        // TODO: Добавить возможность удалить аккаунт.

        $user->delete();

        return redirect()->route('login');
    }
}
