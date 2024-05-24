<?php

namespace App\Actions\User;

use App\Models\User;
use App\Models\Vacancy;

class CheckUserIsVacancyOwnerAction
{

    public function __invoke(?User $user, Vacancy $vacancy): bool
    {
        if (is_null($user)) {
            return false;
        }

        return $user->id === $vacancy->user_id;
    }

}
