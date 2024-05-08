<?php

namespace App\Http\Controllers\Api\Search\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Http\Resources\Api\Search\City\CityCollection;
use App\Models\City;

class IndexController extends Controller
{
    public function __invoke(SearchRequest $request): CityCollection
    {
        $searchData = $request->validated();

        $search = $searchData['q'] ?? null;
        $page = $searchData['page'] ?? null;

        $cites = City::search($search, 'cities', $page);

        return new CityCollection($cites);
    }
}
