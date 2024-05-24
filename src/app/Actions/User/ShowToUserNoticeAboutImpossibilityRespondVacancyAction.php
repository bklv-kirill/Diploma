<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Gate;

class ShowToUserNoticeAboutImpossibilityRespondVacancyAction
{

    public function __invoke(): void
    {
        if ( ! auth()->check()) {
            toastr()->info('Отклики на вакансии могут оставлять только авторизованные пользователи',
                'Уведомление');
        } elseif (Gate::denies('respond-vacancy')) {
            toastr()->info('Вы не можете оставлять отклики на вакансии',
                'Уведомление');
        }
    }

}
