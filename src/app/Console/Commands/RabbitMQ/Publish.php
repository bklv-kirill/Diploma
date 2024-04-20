<?php

namespace App\Console\Commands\RabbitMQ;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Publish extends Command
{
    protected $signature = 'rabbitmq:publish {queue} {message}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $connection = new AMQPStreamConnection(config('rabbitmq.host'), config('rabbitmq.port'), config('rabbitmq.user'), config('rabbitmq.pass'), config('rabbitmq.vhost'));
        $channel = $connection->channel();

        $msg = new AMQPMessage($this->argument('message'));
        $channel->basic_publish($msg, $this->argument('queue'), $this->argument('queue'));

        echo " [x] Sent message\n";

        $channel->close();
        $connection->close();
    }
}
