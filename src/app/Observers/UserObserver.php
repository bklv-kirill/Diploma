<?php

namespace App\Observers;

use App\Actions\RabbitMQ\SendEmailVerificationRabbitMQAction;
use App\Facades\Telegram\TelegramFacade as Telegram;
use App\Models\User;

class UserObserver
{

    public function created(User $user): void
    {
        $user->roles()->attach(2);

        auth()->login($user);

        $sendEmailVerificationRabbitMQAction
            = new SendEmailVerificationRabbitMQAction();
        $sendEmailVerificationRabbitMQAction($user->email);
        //        Telegram::sendMessage(view('components.modules.telegram.user.created', compact(['user']))->render());
    }

    public function deleted(User $user): void
    {
        auth()->logout();
        session()->regenerate();

        $user->attachment()->delete();
        $user->attachment()->sync([]);

        Telegram::sendMessage(view('components.modules.telegram.user.deleted',
            compact(['user']))->render());
    }

}
