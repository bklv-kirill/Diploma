<?php

namespace App\Http\Requests\Api\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q' => ['nullable', 'string'],
            'page' => ['nullable', 'integer'],
        ];
    }
}
