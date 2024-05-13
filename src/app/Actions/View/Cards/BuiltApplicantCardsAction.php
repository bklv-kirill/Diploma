<?php

namespace App\Actions\View\Cards;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BuiltApplicantCardsAction
{
    public function __invoke(LengthAwarePaginator|Collection $applicants): string
    {
        $applicantsCards = '';

        if ($applicants->isEmpty())
            $applicantsCards = view('components.modules.user.applicant.empty')->render();

        foreach ($applicants as $applicant) {
            $applicantsCards .= view('components.modules.user.applicant.card', compact(['applicant']))->render();
        }

        return $applicantsCards;
    }
}
