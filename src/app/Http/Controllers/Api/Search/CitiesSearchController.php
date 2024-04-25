<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\City\CityCollection;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesSearchController extends Controller
{
    public function __invoke(Request $request): CityCollection
    {
        // TODO: Разнести на классы и интерфейсы.
        $cites = City::query()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(20, '*', 'cities', $request->page);

        return new CityCollection($cites);
    }
}
