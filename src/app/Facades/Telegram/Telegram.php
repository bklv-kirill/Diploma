<?php

namespace App\Facades\Telegram;

use Illuminate\Support\Facades\Http;

class Telegram
{
    private const TELEGRAM_API_URL = 'https://api.telegram.org/bot';

    private string $token;
    private string $chatId;
    private string $url;

    public function __construct()
    {
        $this->token = config('telegram.token');
        $this->chatId = config('telegram.chatId');

        $this->url = self::TELEGRAM_API_URL . $this->token;
    }

    public function sendMessage(string $message): void
    {
        $response = Http::post($this->url . '/sendMessage', [
            'chat_id' => $this->chatId,
            'parse_mode' => 'html',
            'text' => $message,
        ]);
    }
}
