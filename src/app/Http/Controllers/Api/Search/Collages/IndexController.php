<?php

namespace App\Http\Controllers\Api\Search\Collages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Search\SearchRequest;
use App\Http\Resources\Api\Search\Collage\CollageCollection;
use App\Models\Collage;

class IndexController extends Controller
{
    public function __invoke(SearchRequest $request): CollageCollection
    {
        $searchData = $request->validated();

        $search = $searchData['q'] ?? null;
        $page = $searchData['page'] ?? null;

        $collages = Collage::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->paginate(20, '*', 'universities', $page);

        return new CollageCollection($collages);
    }
}
