<?php

namespace App\Http\Resources\Api\Search\Collage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
        ];
    }
}
