<?php

namespace App\Http\Resources\Api\Search\City;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
{
    public $collects = CityResource::class;
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
