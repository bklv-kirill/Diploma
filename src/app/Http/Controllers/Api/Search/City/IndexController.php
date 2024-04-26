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

        $search = isset($searchData['q']) ? $searchData['q'] : null;
        $page = isset($searchData['page']) ? $searchData['page'] : null;

        $cites = City::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->paginate(20, '*', 'cities', $page);

        return new CityCollection($cites);
    }
}