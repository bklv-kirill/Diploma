<?php

namespace App\Services\RabbitMQ;

use App\Interfaces\RabbitMQ\IRabbitMQ;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

abstract class AbstractRabbitMQ implements IRabbitMQ
{
    private readonly AMQPStreamConnection $rabbitMQConnection;
    private readonly AMQPChannel $rabbitMQChanel;

    public function openRabbitMQConnection(): void
    {
        $this->rabbitMQConnection = new AMQPStreamConnection(config('rabbitmq.host'), config('rabbitmq.port'), config('rabbitmq.user'), config('rabbitmq.pass'), config('rabbitmq.vhost'));
    }

    public function closeRabbitMQConnection(): void
    {
        $this->rabbitMQConnection->close();
    }

    public function getRabbitMQChanel(): AMQPChannel
    {
        self::openRabbitMQConnection();
        $this->rabbitMQChanel = $this->rabbitMQConnection->channel();

        return $this->rabbitMQChanel;
    }

    public function closeRabbitMQChanel(): void
    {
        $this->rabbitMQChanel->close();
    }
}
