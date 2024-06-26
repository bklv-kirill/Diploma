<?php

namespace App\Http\Resources\Api\Search\City;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'geo_lat' => $this['geo_lat'],
            'geo_lon' => $this['geo_lon'],
        ];
    }
}
