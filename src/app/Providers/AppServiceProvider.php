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
        Blade::component('nav-bar', \App\View\Components\NavBar::class);
        Blade::component('footer', \App\View\Components\Footer::class);

        Blade::component('main-layout', \App\View\Components\Layouts\Main::class);
        Blade::component('auth-register-layout', \App\View\Components\Layouts\AuthRegister::class);

        Blade::component('main-header', \App\View\Components\Headers\Main::class);

        Blade::component('form', \App\View\Components\Forms\Form::class);
        Blade::component('auth-register-input', \App\View\Components\Forms\AuthRegister\Input::class);

        Blade::component('main-modal', \App\View\Components\Modals\MainModal::class);

        \App\Models\User::observe(\App\Observers\UserObserver::class);
    }
}
