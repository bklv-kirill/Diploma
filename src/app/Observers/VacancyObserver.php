<?php

namespace App\Observers;

use App\Facades\Telegram\TelegramFacade as Telegram;
use App\Models\Vacancy;

class VacancyObserver
{

    public function created(Vacancy $vacancy): void
    {
        Telegram::sendMessage(view('components.modules.telegram.vacancy.created',
            compact(['vacancy']))->render());
    }

    public function updated(Vacancy $vacancy): void {}

    public function deleted(Vacancy $vacancy): void
    {
        Telegram::sendMessage(view('components.modules.telegram.vacancy.deleted',
            compact(['vacancy']))->render());
    }

    public function restored(Vacancy $vacancy): void {}

    public function forceDeleted(Vacancy $vacancy): void {}

}
