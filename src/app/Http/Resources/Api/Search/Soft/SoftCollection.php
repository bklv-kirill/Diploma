<?php

namespace App\Http\Resources\Api\Search\Soft;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SoftCollection extends ResourceCollection
{
    public $collects = SoftResource::class;

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
