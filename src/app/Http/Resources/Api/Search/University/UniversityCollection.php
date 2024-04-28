<?php

namespace App\Http\Resources\Api\Search\University;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UniversityCollection extends ResourceCollection
{
    public $collects = UniversityResource::class;

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
