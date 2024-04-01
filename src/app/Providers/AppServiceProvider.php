<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        Blade::component('main-layout', \App\View\Components\Layouts\Main::class);
        Blade::component('main-header', \App\View\Components\Headers\Main::class);
        Blade::component('main-footer', \App\View\Components\Footers\Main::class);

        Blade::component('form', \App\View\Components\Forms\Form::class);
        Blade::component('auth-register-input', \App\View\Components\Forms\AuthRegister\Input::class);

        \App\Models\User::observe(\App\Observers\UserObserver::class);
    }
}
