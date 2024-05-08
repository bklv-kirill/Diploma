<?php

namespace App\Http\Resources\Api\Search\Hard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HardCollection extends ResourceCollection
{
    public $collection = HardResource::class;

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
