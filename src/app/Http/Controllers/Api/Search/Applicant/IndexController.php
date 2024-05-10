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
        if (!is_null($ageFrom) || !is_null($ageTo))
            $applicantService->getApplicantsQueryBuilder()->whereNotNull('birthday');


        $applicantsData = $applicantService->getFilteredApplicants($nextPage);

        if (!is_null($ageFrom)) {
            $applicantsFilteredByAge = $applicantsData->filter(function (User $applicant) use ($ageFrom) {
                return Carbon::now()->year - Carbon::make($applicant->birthday)->year > $ageFrom;
            });
        }

        if (!is_null($ageTo)) {
            $applicantsFilteredByAge = $applicantsData->filter(function (User $applicant) use ($ageTo) {
                return Carbon::now()->year - Carbon::make($applicant->birthday)->year < $ageTo;
            });
        }

        $applicantsCards = $applicantService->getApplicantsCards(isset($applicantsFilteredByAge) ? $applicantsFilteredByAge : $applicantsData);

        return response([
            'status' => 'success',
            'html' => $applicantsCards,
            'currentPage' => $applicantsData->currentPage(),
            'lastPage' => $applicantsData->lastPage(),
        ], 200);
    }
}
