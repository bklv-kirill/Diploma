<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class BirthdayRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $value = Carbon::make($value);
            $nowDate = Carbon::now();
            $minDate = Carbon::now()->subYear(100);
            $maxDate = Carbon::now()->subYear(18);

            if ($value->isAfter($nowDate))
                $fail('Вы из будущего?');
            if (!$value->isAfter($minDate))
                $fail('В таком возрасте вам лучше отдохнуть');
            else if (!$value->isBefore($maxDate))
                $fail('В таком возрасте вам лучше заняться учебой');
        } catch (\Exception $exception) {
            $fail('Дата рождения указана неверно');
        }
    }
}
