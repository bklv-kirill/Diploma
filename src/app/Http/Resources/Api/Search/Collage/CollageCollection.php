<?php

namespace App\Http\Resources\Api\Search\Collage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CollageCollection extends ResourceCollection
{
    public $collects = CollageResource::class;

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
