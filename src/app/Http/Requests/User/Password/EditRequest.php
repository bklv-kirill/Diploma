<?php

namespace App\Http\Requests\User\Password;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old_password' => ['required', 'string', \Illuminate\Validation\Rules\Password::min(8)->mixedCase()],
            'new_password' => ['required', 'string', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)->mixedCase()],
        ];
    }
}
