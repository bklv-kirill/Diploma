<?php

namespace App\Traits\Filters;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{

    public static function scopeFilter(
        Builder $builder,
        AbstractFilter $filter
    ): Builder {
        return $filter->apply($builder);
    }

}
