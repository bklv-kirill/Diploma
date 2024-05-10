<?php

namespace App\Services\Search\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ApplicantSearchService
{
    public function __construct(
        private readonly Builder $applicantsQueryBuilder,
    )
    {
    }

    public function builtDifficultFilter(?array $values, string $relation, string $column): void
    {
        $this->applicantsQueryBuilder->when(!is_null($values), function (Builder $query) use ($values, $relation, $column) {
            foreach ($values as $value) {
                $query->whereHas($relation, function (Builder $query) use ($value, $column) {
                    $query->where($column, $value);
                });
            }
        });
    }

    public function getApplicantsQueryBuilder(): Builder
    {
        return $this->applicantsQueryBuilder;
    }

    public function builtSimpleFilter(string $column, string $operator, ?string $value): void
    {
        $this->applicantsQueryBuilder->when(!is_null($value), function (Builder $query) use ($value, $column, $operator) {
            $query->where($column, $operator, $value);
        });
    }

    public function getApplicantsCards(LengthAwarePaginator|Collection $applicants): string
    {
        $applicantsCards = '';

        if ($applicants->isEmpty()) return view('components.modules.user.applicant.empty')->render();

        foreach ($applicants as $applicant) {
            $applicantsCards .= view('components.modules.user.applicant.card', compact(['applicant']))->render();
        }

        return $applicantsCards;
    }

    public function getFilteredApplicants(int $nextPage): LengthAwarePaginator
    {
        return $this->applicantsQueryBuilder->paginate(1, ['*'], 'applicants', $nextPage);
    }
}
