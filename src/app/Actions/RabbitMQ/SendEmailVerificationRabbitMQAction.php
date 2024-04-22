<?php

namespace App\Actions\RabbitMQ;

use App\Services\RabbitMQ\AbstractRabbitMQ;
use PhpAmqpLib\Message\AMQPMessage;

class SendEmailVerificationRabbitMQAction extends AbstractRabbitMQ
{

    public function __invoke(string $email): void
    {
        $rabbitMQChanel = $this->getRabbitMQChanel();

        $message = new AMQPMessage($email);
        $rabbitMQChanel->basic_publish($message, 'user', 'user');

        $this->closeRabbitMQChanel();
        $this->closeRabbitMQConnection();
    }

}
