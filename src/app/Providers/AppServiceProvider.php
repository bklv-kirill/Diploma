<?php

namespace App\Providers;

use App\Models\Vacancy;
use App\Policies\VacancyPolicy;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void {}

    public function boot(): void
    {
        // Nav-bar и футер.
        Blade::component('nav-bar', \App\View\Components\NavBar::class);
        Blade::component('footer', \App\View\Components\Footer::class);

        // Лэейауты.
        Blade::component('main-layout',
            \App\View\Components\Layouts\Main::class);
        Blade::component('auth-register-layout',
            \App\View\Components\Layouts\AuthRegister::class);

        // Хедеры.
        Blade::component('main-header',
            \App\View\Components\Headers\Main::class);

        // Формы и модули форм.
        Blade::component('form', \App\View\Components\Forms\Form::class);
        Blade::component('auth-register-input',
            \App\View\Components\Forms\Modules\AuthRegister\Input::class);
        Blade::component('auth-register-text',
            \App\View\Components\Forms\Modules\AuthRegister\Text::class);
        Blade::component('password-input',
            \App\View\Components\Forms\Modules\Password\Input::class);

        // Модалки.
        Blade::component('main-modal',
            \App\View\Components\Modals\MainModal::class);

        // Модули.
        Blade::component('user-avatar',
            \App\View\Components\Modules\User\Avatar::class);
        Blade::component('user-edit-contact',
            \App\View\Components\Modules\Pages\User\Edit\Contact::class);
        Blade::component('user-profile-specification',
            \App\View\Components\Modules\Pages\User\Profile\Specification::class);

        \App\Models\User::observe(\App\Observers\UserObserver::class);

        Blade::if('emailVerified', function () {
            $user = auth()->user();

            return ! is_null($user->email_verified_at);
        });

        Gate::policy(Vacancy::class, VacancyPolicy::class);
    }

}
