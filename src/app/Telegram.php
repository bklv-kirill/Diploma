<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Telegram
{
    private const API_URL = 'https://api.telegram.org/bot';
    private string $chatId;
    private string $token;
    private string $url;

    public function __construct()
    {
        $this->token = config('telegram.token');
        $this->chatId = config('telegram.chatId');

        $this->url = self::API_URL . $this->token;
    }

    public function sendMessage(string $message): void
    {
        $sendMessageUrl = $this->url . '/' . 'sendMessage';

        Http::post($sendMessageUrl, [
            'chat_id' => $this->chatId,
            'parse_mode' => 'html',
            'text' => $message,
        ]);
    }
}
