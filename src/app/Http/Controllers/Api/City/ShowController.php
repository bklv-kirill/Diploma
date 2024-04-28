<?php

namespace App\Http\Controllers\Api\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Search\City\CityResource;
use App\Models\City;

class ShowController extends Controller
{
    public function __invoke(City $city): CityResource
    {
        sleep(1);

        return new CityResource($city);
    }
}
