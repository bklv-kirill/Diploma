<?php

namespace App\Actions\View\Cards;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class BuildApplicantsCardsAction
{

    public function __invoke(
        LengthAwarePaginator|Collection $applicants,
        ?string $search
    ): string {
        $applicantsCards = '';

        if ($applicants->isEmpty()) {
            $applicantsCards
                = view('components.forms.empty')->render();
        }

        foreach ($applicants as $applicant) {
            if ( ! is_null($search)) {
                $applicant->about = Str::replace(
                    $search,
                    '<span style="background-color: #4070f4; color: #fff">'
                    .$search
                    .'</span>',
                    $applicant->about
                );
            }
            $applicantsCards .= view(
                'components.modules.pages.applicant.card',
                compact(['applicant'])
            )->render();
        }

        return $applicantsCards;
    }

}
