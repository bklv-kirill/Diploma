<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class AbstractFilter
{

    protected array $filters = [];

    public function __construct(array $filterData)
    {
        foreach ($filterData as $column => $value) {
            if (is_null($value)) {
                continue;
            }

            $this->filters[Str::camel($column)] = $value;
        }
    }

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
