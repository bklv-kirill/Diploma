<?php

if (! function_exists('getFormatedDate')) {
    function getFormatedDate(string $date): string
    {
        return \Illuminate\Support\Carbon::parse($date)->format('d-m-Y');
    }
}
