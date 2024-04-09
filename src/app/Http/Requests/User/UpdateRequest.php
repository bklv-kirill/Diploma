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
            'avatar' => ['nullable', File::types(['png', 'jpg', 'jpeg'])->max(25 * 1024)],
        ];
    }
}
