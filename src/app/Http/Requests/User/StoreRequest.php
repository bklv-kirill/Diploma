<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)->mixedCase()],
        ];
    }
}
