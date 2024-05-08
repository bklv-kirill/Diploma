<?php

namespace App\Http\Controllers\Api\Search\Softs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Http\Resources\Api\Search\Soft\SoftCollection;
use App\Models\Soft;

class IndexController extends Controller
{
    public function __invoke(SearchRequest $request): SoftCollection
    {
        $searchData = $request->validated();

        $search = $searchData['q'] ?? null;
        $page = $searchData['page'] ?? null;

        $softs = Soft::search($search, 'softs', $page);

        return new SoftCollection($softs);
    }
}
