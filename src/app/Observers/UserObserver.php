<?php

namespace App\Observers;

use App\Jobs\User\SendEmailVerificationJob;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        auth()->login($user);

        SendEmailVerificationJob::dispatch($user)
            ->onConnection('redis')
            ->onQueue('user');
    }

    public function deleted(User $user): void
    {
        auth()->logout();
        session()->regenerate();

        $user->attachment()->delete();
        $user->attachment()->sync([]);
    }
}
