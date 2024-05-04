<?php

namespace App\Observers;

use App\Actions\RabbitMQ\SendEmailVerificationRabbitMQAction;

use App\Models\User;
use App\Telegram;

class UserObserver
{
    public function __construct(private readonly Telegram $telegram)
    {
    }

    public function created(User $user): void
    {
        auth()->login($user);

        $sendEmailVerificationRabbitMQAction = new SendEmailVerificationRabbitMQAction();
        $sendEmailVerificationRabbitMQAction($user->email);

        $this->telegram->sendMessage(view('components.modules.telegram.user.created', compact('user'))->render());
    }

    public function deleted(User $user): void
    {
        auth()->logout();
        session()->regenerate();

        $user->attachment()->delete();
        $user->attachment()->sync([]);

        $this->telegram->sendMessage(view('components.modules.telegram.user.deleted', compact('user'))->render());
    }
}
