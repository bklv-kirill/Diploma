<?php

namespace App\Actions\User;

use App\Models\User;

class CheckUserIsApplicantAction
{

    public function __invoke(?User $user): bool
    {
        if (is_null($user) || ! $user->exists) {
            return false;
        }

        return ! $user->hasRole('Администратор')
            && ! $user->hasRole('Работадатель');
    }

}
