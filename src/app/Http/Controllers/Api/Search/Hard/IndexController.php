<?php

namespace App\Http\Controllers\Api\Search\Hard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Http\Resources\Api\Search\Hard\HardCollection;
use App\Models\Hard;

class IndexController extends Controller
{
    public function __invoke(SearchRequest $request): HardCollection
    {
        $searchData = $request->validated();

        $search = $searchData['q'] ?? null;
        $page = $searchData['page'] ?? null;

        $hards = Hard::search($search, 'hards', $page);

        return new HardCollection($hards);
    }
}
