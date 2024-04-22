<?php

namespace App\Observers;

use App\Actions\RabbitMQ\SendEmailVerificationRabbitMQAction;
use PhpAmqpLib\Message\AMQPMessage;

use App\Models\User;

class UserObserver
{

    public function created(User $user): void
    {
        auth()->login($user);

        $sendEmailVerificationRabbitMQAction = new SendEmailVerificationRabbitMQAction();
        $sendEmailVerificationRabbitMQAction($user->email);
    }

    public function deleted(User $user): void
    {
        auth()->logout();
        session()->regenerate();

        $user->attachment()->delete();
        $user->attachment()->sync([]);
    }
}
