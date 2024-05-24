<?php

namespace App\Actions\View\Cards;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class BuildVacancyCardsAction
{

    public function __invoke(
        LengthAwarePaginator|Collection $vacancies,
        ?string $searchTitle,
        ?string $searchDescription,
        ?int $currentAuthUserId,
    ): string {
        $vacanciesCards = '';

        $user = User::query()->find($currentAuthUserId);

        if ($vacancies->isEmpty()) {
            $vacanciesCards
                = view('components.forms.empty')->render();
        }

        foreach ($vacancies as $vacancy) {
            if ( ! is_null($searchTitle)) {
                $vacancy->title = Str::replace(
                    $searchTitle,
                    '<span style="background-color: #4070f4; color: #fff">'
                    .$searchTitle
                    .'</span>',
                    $vacancy->about
                );
            }
            if ( ! is_null($searchDescription)) {
                $vacancy->about = Str::replace(
                    $searchDescription,
                    '<span style="background-color: #4070f4; color: #fff">'
                    .$searchDescription
                    .'</span>',
                    $vacancy->about
                );
            }
            
            $vacanciesCards .= view(
                'components.modules.pages.vacancy.card',
                compact(['vacancy', 'user'])
            )->render();
        }

        return $vacanciesCards;
    }

}
