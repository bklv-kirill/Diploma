<?php

namespace App\Interfaces\RabbitMQ;

use PhpAmqpLib\Channel\AMQPChannel;

interface IRabbitMQ
{
    public function openRabbitMQConnection(): void;

    public function closeRabbitMQConnection(): void;
    public function getRabbitMQChanel(): AMQPChannel;
    public function closeRabbitMQChanel(): void;
}
