<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255', 'unique:users'],
            'gender' => ['required', 'bool'],
            'password' => ['required', 'string', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)->mixedCase()],
        ];
    }
}
