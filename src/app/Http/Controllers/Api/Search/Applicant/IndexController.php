<?php

namespace App\Http\Controllers\Api\Search\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\ApplicantRequest;
use App\Models\User;
use App\Services\Search\User\ApplicantSearchService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function __invoke(ApplicantRequest $request): Response
    {
        sleep(1);

        $applicantsSearchData = $request->validated();

        $cityId = $applicantsSearchData['cityId'];
        $ageFrom = $applicantsSearchData['ageFrom'];
        $ageTo = $applicantsSearchData['ageTo'];
        $employments = $applicantsSearchData['employments'];
        $charts = $applicantsSearchData['charts'];
        $softs = $applicantsSearchData['softs'];
        $hards = $applicantsSearchData['hards'];
        $education = $applicantsSearchData['education'];
        $salaryFrom = $applicantsSearchData['salaryFrom'];
        $salaryTo = $applicantsSearchData['salaryTo'];
        $currentAuthUserId = $applicantsSearchData['currentAuthUserId'];
        $orderColumn = $applicantsSearchData['orderColumn'] ?? null;
        $orderType = $applicantsSearchData['orderType'] ?? null;
        $nextPage = $applicantsSearchData['nextPage'] ?? 1;

        $applicantService = new ApplicantSearchService(User::applicants());
        $applicantService->builtSimpleFilter('city_id', '=', $cityId);
        $applicantService->builtSimpleFilter('salary', '>=', $salaryFrom);
        $applicantService->builtSimpleFilter('salary', '<=', $salaryTo);

        $applicantService->builtDifficultFilter($employments, 'employments', 'employment_id');
        $applicantService->builtDifficultFilter($charts, 'charts', 'chart_id');
        $applicantService->builtDifficultFilter($softs, 'softs', 'soft_id');
        $applicantService->builtDifficultFilter($hards, 'hards', 'hard_id');

        $applicantService->getApplicantsQueryBuilder()->when(!is_null($education), function (Builder $query) use ($education) {
            foreach ($education as $direction) {
                $query->has($direction);
            }
        });

        if (!is_null($currentAuthUserId))
            $applicantService->getApplicantsQueryBuilder()->whereNot('id', $currentAuthUserId);
        if (!is_null($ageTo))
            $applicantService->getApplicantsQueryBuilder()->whereDate('birthday', '>', Carbon::now()->subYear($ageTo));
        if (!is_null($ageFrom))
            $applicantService->getApplicantsQueryBuilder()->whereDate('birthday', '<', Carbon::now()->subYear($ageFrom));
        if (!is_null($orderColumn) && !is_null($orderType)) {
            $applicantService->getApplicantsQueryBuilder()->orderBy($orderColumn, $orderType);
        }

        $applicantsData = $applicantService->getFilteredApplicants($nextPage);

        $applicantsCards = $applicantService->getApplicantsCards(isset($applicantsFilteredByAge) ? $applicantsFilteredByAge : $applicantsData);

        return response([
            'status' => 'success',
            'html' => $applicantsCards,
            'currentPage' => $applicantsData->currentPage(),
            'lastPage' => $applicantsData->lastPage(),
        ], 200);
    }
}
