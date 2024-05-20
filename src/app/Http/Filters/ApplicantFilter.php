<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ApplicantFilter extends AbstractFilter
{

    public function __construct(array $filterData)
    {
        $filterData['isApplicant'] = true;

        parent::__construct($filterData);
    }

    protected function search(Builder $builder, string $search): Builder
    {
        return $builder->where('about', 'LIKE', '%'.$search.'%');
    }

    protected function isApplicant(Builder $builder): Builder
    {
        return $builder->applicants();
    }

    protected function cityId(Builder $builder, int $cityId): Builder
    {
        return $builder->where('city_id', $cityId);
    }

    protected function ageFrom(Builder $builder, int $ageFrom): Builder
    {
        return $builder->whereDate(
            'birthday',
            '<',
            Carbon::now()->subYear($ageFrom)
        );
    }

    protected function ageTo(Builder $builder, int $ageTo): Builder
    {
        return $builder->whereDate(
            'birthday',
            '>',
            Carbon::now()->subYear($ageTo)
        );
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

    protected function education(Builder $builder, array $education): Builder
    {
        foreach ($education as $educationLevel) {
            $builder->has($educationLevel);
        }

        return $builder;
    }

    protected function salaryFrom(Builder $builder, int $salaryFrom): Builder
    {
        return $builder->where('salary', '>=', $salaryFrom);
    }

    protected function salaryTo(Builder $builder, int $salaryTo): Builder
    {
        return $builder->where('salary', '<=', $salaryTo);
    }

    protected function currentAuthUserId(
        Builder $builder,
        int $currentAuthUserId
    ): Builder {
        return $builder->where('id', '!=', $currentAuthUserId);
    }

    protected function order(Builder $builder, array $orderData): Builder
    {
        return $builder->orderBy(
            $orderData['orderColumn'],
            $orderData['orderType']
        );
    }

}
