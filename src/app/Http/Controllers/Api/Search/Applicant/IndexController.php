<?php

namespace App\Http\Controllers\Api\Search\Applicant;

use App\Actions\View\Cards\BuiltApplicantCardsAction;
use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicantFilter;
use App\Http\Requests\Api\Search\ApplicantRequest;
use App\Models\User;
use Illuminate\Http\Response;

class IndexController extends Controller
{

    public function __invoke(ApplicantRequest $request): Response
    {
        sleep(1);

        $applicantsSearchData = $request->validated();

        $nextPage = $applicantsSearchData['nextPage'] ?? 1;

        $filter         = new ApplicantFilter($applicantsSearchData);
        $applicantsData = User::filter($filter)->paginate(
            5,
            ['*'],
            'applicants',
            $nextPage
        );

        $builtApplicantsCardsAction = new BuiltApplicantCardsAction();
        $applicantsCards            = $builtApplicantsCardsAction(
            $applicantsData,
            $applicantsSearchData['search'] ?? null
        );

        return response([
            'status'      => 'success',
            'html'        => $applicantsCards,
            'currentPage' => $applicantsData->currentPage(),
            'lastPage'    => $applicantsData->lastPage(),
        ], 200);
    }

}
