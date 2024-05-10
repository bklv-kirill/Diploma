<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Employment;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(): View
    {
        $user = auth()->user();

        if (is_null($user->email_verified_at))
            toastr()->info('Полная настройка вашего профила станет доступна после подтверждения Email адреса', 'Уведомление');

        // TODO: Реализовать получение $employments и $charts через кеш. Добавить к ним обсерверы.
        $employments = Employment::query()->get();
        $charts = Chart::query()->get();

        return view('pages.user.edit', compact(['user', 'employments', 'charts']));
    }
}
