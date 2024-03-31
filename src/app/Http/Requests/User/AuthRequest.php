<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'string', \Illuminate\Validation\Rules\Password::min(8)->mixedCase()],
            'remember_me' => ['nullable', 'in:on'],
        ];
    }
}
