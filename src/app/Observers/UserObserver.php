<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    public function created(User $user): void
    {
        auth()->login($user);

        // TODO: Реализовать отправку почтовых писем через RabbitMQ очереди.
        event(new Registered($user));
    }

    public function deleted(User $user): void
    {
        auth()->logout();
        session()->regenerate();

        $user->attachment()->delete();
        $user->attachment()->sync([]);
    }
}
