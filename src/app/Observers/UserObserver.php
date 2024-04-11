<?php

namespace App\Observers;

use App\Models\user;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    /**
     * Handle the user "created" event.
     */
    public function created(user $user): void
    {
        auth()->login($user);

        // TODO: Реализовать отправку почтовых писем через RabbitMQ очереди.
        event(new Registered($user));
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        auth()->logout();
        session()->regenerate();
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
