<?php

namespace App\Http\Controllers\Pages\Vacancy;

use App\Actions\User\ShowToUserNoticeAboutImpossibilityRespondVacancyAction;
use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Employment;
use Illuminate\View\View;

class IndexController extends Controller
{

    public function __invoke(): View
    {
        // TODO: Реализовать получение $employments и $charts через кеш. Добавить к ним обсерверы.
        $employments = Employment::query()->get();
        $charts      = Chart::query()->get();

        (new ShowToUserNoticeAboutImpossibilityRespondVacancyAction())();

        return view('pages.vacancy.index', compact('employments', 'charts'));
    }

}
