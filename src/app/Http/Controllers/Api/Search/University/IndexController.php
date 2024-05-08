<?php

namespace App\Http\Controllers\Api\Search\University;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Http\Resources\Api\Search\University\UniversityCollection;
use App\Models\University;

class IndexController extends Controller
{
    public function __invoke(SearchRequest $request): UniversityCollection
    {
        $searchData = $request->validated();

        $search = $searchData['q'] ?? null;
        $page = $searchData['page'] ?? null;

        $universities = University::search($search, 'universities', $page);

        return new UniversityCollection($universities);
    }
}
