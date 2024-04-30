<?php

use function PHPUnit\Framework\isNull;

if (!function_exists('getFormatedDate')) {
    function getFormatedDate(?string $date): string|null
    {
        return $date ? \Illuminate\Support\Carbon::parse($date)->format('d.m.Y') : null;
    }
}
if (!function_exists('getMoney')) {
    function getMoney(?int $money): string|null
    {
        return $money ? number_format($money, 0, '.', ' ') . '&#8381;' : null;
    }
}
