<?php

namespace App\Http\Controllers\Pages\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Employment;
use App\Models\MainRole;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $applicants = MainRole::query()->firstWhere('slug', 'applicant')->users;

        // TODO: Реализовать получение $employments и $charts через кеш. Добавить к ним обсерверы.
        $employments = Employment::query()->get();
        $charts = Chart::query()->get();

        return view('pages.applicant.index', compact(['applicants', 'employments', 'charts']));
    }
}
