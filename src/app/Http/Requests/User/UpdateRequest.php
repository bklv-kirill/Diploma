<?php

namespace App\Http\Requests\User;

use App\Rules\BirthdayRule;
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
            'avatar' => ['nullable', File::types(['png', 'jpg', 'jpeg'])->max('10mb')],
            'phone' => ['nullable', 'string', 'min:18', 'max:18', 'unique:users'],
            'birthday' => ['nullable', new BirthdayRule()],
            'city_id' => ['nullable', 'integer', 'exists:cities,id'],
            'salary' => ['nullable', 'integer', 'min:19242', 'max:9999999'],
            'universities' => ['nullable', 'array'],
            'universities.*' => ['nullable', 'integer', 'exists:universities,id'],
            'collages' => ['nullable', 'array'],
            'collages.*' => ['nullable', 'integer', 'exists:collages,id'],
            'softs' => ['nullable', 'array'],
            'softs.*' => ['nullable', 'integer', 'exists:softs,id'],
            'hards' => ['nullable', 'array'],
            'hards.*' => ['nullable', 'integer', 'exists:hards,id'],
            'employments' => ['nullable', 'array'],
            'employments.*' => ['nullable', 'integer', 'exists:employments,id'],
            'charts' => ['nullable', 'array'],
            'charts.*' => ['nullable', 'integer', 'exists:charts,id'],
        ];
    }
}
