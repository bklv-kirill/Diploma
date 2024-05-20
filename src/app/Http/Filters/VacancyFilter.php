<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class VacancyFilter extends AbstractFilter
{

    protected function title(Builder $builder, string $title): Builder
    {
        return $builder->where('title', 'LIKE', '%'.$title.'%');
    }

    protected function salaryFrom(Builder $builder, string $salaryFrom): Builder
    {
        return $builder->where('salary_from', '>=', $salaryFrom);
    }

    protected function salaryTo(Builder $builder, string $salaryTo): Builder
    {
        return $builder->where('salary_to', '<=', $salaryTo);
    }

    protected function city(Builder $builder, string $city): Builder
    {
        return $builder->where('city_id', $city);
    }

}
