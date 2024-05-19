<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

class VacancyEditScreen extends Screen
{

    public function query(): iterable
    {
        return [];
    }

    public function name(): ?string
    {
        return 'Редактирование вакансии: ';
    }

    public function commandBar(): iterable
    {
        return [];
    }

    public function layout(): iterable
    {
        return [];
    }

}
