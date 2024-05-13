<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected array $filters = [];

    public function apply(Builder $builder): Builder
    {
        foreach ($this->filters as $filter => $value) {
            if (method_exists($this, $filter)) {
                call_user_func_array([$this, $filter], [$builder, $value]);
            }
        }

        return $builder;
    }
}
