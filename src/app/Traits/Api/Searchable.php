<?php

namespace App\Traits\Api;

use Illuminate\Pagination\LengthAwarePaginator;

trait Searchable
{
    public static function search(?string $search, string $pageName, ?int $page): LengthAwarePaginator
    {
        return self::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('name')
            ->paginate(20, ['*'], $pageName, $page);
    }
}
