<?php

namespace App\Http\Requests\Api\Response;

use Illuminate\Foundation\Http\FormRequest;

class ResponseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'currentAuthUserId' => ['required', 'integer', 'exists:users,id'],
            'vacancyId'         => [
                'required',
                'integer',
                'exists:vacancies,id',
            ],
        ];
    }

}
