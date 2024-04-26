<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about' => ['nullable', 'string', 'max:10000'],
            'avatar' => ['nullable', File::image()->max('10mb')],
            'phone' => ['nullable', 'string', 'min:18', 'max:18', 'unique:users'],
            'city_id' => ['nullable', 'integer', 'exists:cities,id'],
            'employments' => ['nullable', 'array'],
            'employments.*' => ['nullable', 'int', 'exists:employments,id'],
            'charts' => ['nullable', 'array'],
            'charts.*' => ['nullable', 'int', 'exists:charts,id'],
        ];
    }
}
