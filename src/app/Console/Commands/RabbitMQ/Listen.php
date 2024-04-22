<?php

namespace App\Console\Commands\RabbitMQ;

use App\Models\User;
use App\Services\RabbitMQ\RabbitMQService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;
use PhpAmqpLib\Message\AMQPMessage;

class Listen extends Command
{
    protected $signature = 'rabbitmq:listen';

    protected $description = 'Command description';

    public function handle(RabbitMQService $rabbitMQService): void
    {
        $rabbitMQChanel = $rabbitMQService->getRabbitMQChanel();

        dump(" [*] Запущен RabbitMQ обработчик для очереди 'USER'. Для остановки нажмите CTRL+C");

        $rabbitMQCallback = function (AMQPMessage $message) {
            $user = User::query()->firstWhere('email', $message->body);

            event(new Registered($user));
            dump(' [*] Пользователю: ' . $user->fullName() . ' было отправлено письмо для подтверждения Email.');
        };

        $rabbitMQChanel->basic_consume('user', '', false, true, false, false, $rabbitMQCallback);

        try {
            $rabbitMQChanel->consume();
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }
    }
}
