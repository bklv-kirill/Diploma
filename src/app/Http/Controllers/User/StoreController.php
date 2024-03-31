<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $userData = $request->validated();

        User::query()->create($userData);

        return redirect()->route('user.login');
    }
}
