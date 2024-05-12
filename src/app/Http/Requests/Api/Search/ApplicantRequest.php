<?php

namespace App\Http\Requests\Api\Search;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cityId' => ['nullable', 'integer', 'exists:cities,id'],
            'ageFrom' => ['nullable', 'integer'],
            'ageTo' => ['nullable', 'integer'],
            'employments' => ['nullable', 'array'],
            'employments.*' => ['nullable', 'integer', 'exists:employments,id'],
            'charts' => ['nullable', 'array'],
            'charts.*' => ['nullable', 'integer', 'exists:charts,id'],
            'softs' => ['nullable', 'array'],
            'softs.*' => ['nullable', 'integer', 'exists:softs,id'],
            'hards' => ['nullable', 'array'],
            'hards.*' => ['nullable', 'integer', 'exists:hards,id'],
            'education' => ['nullable', 'array'],
            'education.*' => ['nullable', 'string', 'in:universities,collages'],
            'salaryFrom' => ['nullable', 'integer'],
            'salaryTo' => ['nullable', 'integer'],
            'currentAuthUserId' => ['nullable', 'integer'],
            'orderColumn' => ['nullable', 'string', 'in:salary,birthday'],
            'orderType' => ['nullable', 'string', 'in:desc,asc'],
            'nextPage' => ['nullable', 'integer'],
        ];
    }
}
