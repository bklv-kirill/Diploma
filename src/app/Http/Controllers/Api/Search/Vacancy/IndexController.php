<?php

namespace App\Http\Controllers\Api\Search\Vacancy;

use App\Actions\View\Cards\BuildVacancyCardsAction;
use App\Http\Controllers\Controller;
use App\Http\Filters\VacancyFilter;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Models\Vacancy;

class IndexController extends Controller
{

    public function __invoke(SearchRequest $request)
    {
        sleep(1);

        $vacanciesSearchData = $request->validated();

        $nextPage = $vacanciesSearchData['nextPage'] ?? 1;

        $filter        = new VacancyFilter($vacanciesSearchData);
        $vacanciesData = Vacancy::filter($filter)
            ->paginate(5, ['*'], 'vacancies', $nextPage);

        $buildVacancyCardsAction = new BuildVacancyCardsAction();
        $vacanciesCards          = $buildVacancyCardsAction($vacanciesData,
            $vacanciesSearchData['searchTitle'] ?? null,
            $vacanciesSearchData['searchDescription'] ?? null,
            $vacanciesSearchData['currentAuthUserId'] ?? null);

        return response([
            'status'      => 'success',
            'html'        => $vacanciesCards,
            'currentPage' => $vacanciesData->currentPage(),
            'lastPage'    => $vacanciesData->lastPage(),
        ], 200);
    }

}
