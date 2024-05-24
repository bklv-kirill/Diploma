<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class VacancyFilter extends AbstractFilter
{

    protected function searchTitle(
        Builder $builder,
        string $searchTitle
    ): Builder {
        return $builder->where('title', 'LIKE', '%'.$searchTitle.'%');
    }

    protected function searchDescription(
        Builder $builder,
        string $searchDescription
    ): Builder {
        return $builder->where('description', 'LIKE',
            '%'.$searchDescription.'%');
    }

    protected function cityId(Builder $builder, int $cityId): Builder
    {
        return $builder->where('city_id', $cityId);
    }

    protected function employments(
        Builder $builder,
        array $employments
    ): Builder {
        foreach ($employments as $employment) {
            $builder->whereHas(
                'employments',
                function (Builder $query) use ($employment) {
                    $query->where('employment_id', $employment);
                }
            );
        }

        return $builder;
    }

    protected function charts(Builder $builder, array $charts): Builder
    {
        foreach ($charts as $chart) {
            $builder->whereHas(
                'charts',
                function (Builder $query) use ($chart) {
                    $query->where('chart_id', $chart);
                }
            );
        }

        return $builder;
    }

    protected function softs(Builder $builder, array $softs): Builder
    {
        foreach ($softs as $soft) {
            $builder->whereHas('softs', function (Builder $query) use ($soft) {
                $query->where('soft_id', $soft);
            });
        }

        return $builder;
    }

    protected function hards(Builder $builder, array $hards): Builder
    {
        foreach ($hards as $hard) {
            $builder->whereHas('hards', function (Builder $query) use ($hard) {
                $query->where('hard_id', $hard);
            });
        }

        return $builder;
    }

    protected function salaryFrom(Builder $builder, int $salaryFrom): Builder
    {
        return $builder->where('salary_from', '>=', $salaryFrom);
    }

    protected function salaryTo(Builder $builder, int $salaryTo): Builder
    {
        return $builder->where('salary_to', '<=', $salaryTo);
    }

    protected function order(Builder $builder, array $orderData): Builder
    {
        return $builder->orderBy(
            $orderData['orderColumn'],
            $orderData['orderType']
        );
    }

}
