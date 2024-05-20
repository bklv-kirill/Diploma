<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;

class VacancyPolicy
{

    public function viewAny(User $user): bool {}

    public function view(User $user, Vacancy $vacancy): bool {}

    public function create(User $user): bool {}

    public function update(User $user, Vacancy $vacancy): bool
    {
        return $vacancy->exists
            ?
            $user->id === $vacancy->user_id
            :
            true;
    }

    public function delete(User $user, Vacancy $vacancy): bool {}

    public function restore(User $user, Vacancy $vacancy): bool {}

    public function forceDelete(User $user, Vacancy $vacancy): bool {}

}
