<?php

namespace App\Orchid\Screens;

use App\Models\Chart;
use App\Models\City;
use App\Models\Employment;
use App\Models\Hard;
use App\Models\Soft;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class VacancyStoreScreen extends Screen
{

    public function query(): iterable
    {
        return [];
    }

    public function name(): ?string
    {
        return 'Создание вакансии';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Создать')
                ->icon('pencil')
                ->method('store'),
        ];
    }

    public function store(Request $request): RedirectResponse
    {
        $requestData = $request->all();
        $vacancyData = $requestData['vacancy'];

        $redirectBack = redirect()->back()
            ->withInput([
                'vacancy.title'       => $vacancyData['title'],
                'vacancy.about'       => $vacancyData['about'],
                'vacancy.salary_from' => $vacancyData['salary_from'],
                'vacancy.salary_to'   => $vacancyData['salary_to'],
                'vacancy.employments' => $vacancyData['employments'],
                'vacancy.charts'      => $vacancyData['charts'],
                'vacancy.softs'       => $vacancyData['softs'],
                'vacancy.hards'       => $vacancyData['hards'],
                'vacancy.city_id'     => $vacancyData['city_id'],
            ]);

        if (Str::length($vacancyData['title']) < 3) {
            Toast::error('Название вакансии должно содержать минимум 3 символа.');

            return $redirectBack;
        }
        if (Str::length($vacancyData['about']) < 3) {
            Toast::error('Описание вакансии должно содержать минимум 3 символа.');

            return $redirectBack;
        } elseif (Str::length($vacancyData['about']) > 10000) {
            Toast::error('Описание вакансии не может быть длиннее 10000 символов.');

            return $redirectBack;
        }
        if ($vacancyData['salary_from']
            > $vacancyData['salary_to']
        ) {
            Toast::error('Начальная зарплата не может быть больше конечной.');

            return $redirectBack;
        } elseif ($vacancyData['salary_from'] < 19242) {
            Toast::error('Начальная зарплата не может быть меньше 19242 рублей.');

            return $redirectBack;
        }

        $vacancy = Vacancy::query()->create($vacancyData);

        if ($employments = $vacancyData['employments'] ?? null) {
            $vacancy->employments()->attach($employments);
        }

        if ($charts = $vacancyData['charts'] ?? null) {
            $vacancy->charts()->attach($charts);
        }

        if ($softs = $vacancyData['softs'] ?? null) {
            $vacancy->softs()->attach($softs);
        }

        if ($hards = $vacancyData['hards'] ?? null) {
            $vacancy->hards()->attach($hards);
        }

        return redirect()->route('platform.vacancy.index');
    }

    public function layout(): iterable
    {
        return [
            Layout::tabs([
                'Основные настройки' => Layout::rows([
                    Input::make('vacancy.title')
                        ->title('Название вакансии')
                        ->type('text')
                        ->required(),

                    TextArea::make('vacancy.about')
                        ->rows(10)
                        ->title('Описание вакансии')
                        ->required(),

                    Input::make('vacancy.salary_from')
                        ->title('Зарплата (от / руб.)')
                        ->type('number')
                        ->required(),

                    Input::make('vacancy.salary_to')
                        ->title('Зарплата (до / руб.)')
                        ->type('number')
                        ->required(),

                    Select::make('vacancy.charts')
                        ->fromModel(Chart::class, 'name')
                        ->multiple()
                        ->title('Тип занятости')
                        ->required(),

                    Select::make('vacancy.employments')
                        ->fromModel(Employment::class, 'name')
                        ->multiple()
                        ->title('График работы')
                        ->required(),

                    Select::make('vacancy.softs')
                        ->fromModel(Soft::class, 'name')
                        ->multiple()
                        ->title('Гибкие навыки'),

                    Select::make('vacancy.hards')
                        ->fromModel(Hard::class, 'name')
                        ->multiple()
                        ->title('Профессиональные навыки'),

                    Select::make('vacancy.city_id')
                        ->fromModel(City::class, 'name')
                        ->title('Город')
                        ->empty('Город не выбран')
                        ->required(),
                ]),
            ]),
        ];
    }

}
