<?php

namespace App\Providers;

use App\Facades\Telegram\Telegram;
use Illuminate\Support\ServiceProvider;

class TelegramServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('telegram', function () {
            return new Telegram();
        });
    }

    public function boot(): void
    {
    }
}
