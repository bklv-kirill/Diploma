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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class VacancyEditScreen extends Screen
{

    public $vacancy;

    public function permission(): ?iterable
    {
        return [
            'vacancy.create',
        ];
    }

    public function query(Vacancy $vacancy): iterable
    {
        abort_if(Gate::denies('update', $vacancy), 403);

        return [
            'vacancy' => $vacancy,
        ];
    }

    public function name(): ?string
    {
        return $this->vacancy->exists ? 'Редактирование вакансии: '
            .$this->vacancy->title : 'Создание вакансии';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить')
                ->icon('pencil')
                ->method('store')
                ->canSee(! $this->vacancy->exists),

            Button::make('Обновить')
                ->icon('save')
                ->method('update')
                ->canSee($this->vacancy->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('delete')
                ->canSee($this->vacancy->exists),
        ];
    }

    public function update(Request $request, Vacancy $vacancy): RedirectResponse
    {
        $vacancyData              = $request->get('vacancy');
        $checkVacancyDataResponse = $this->checkVacancyData($vacancyData);
        if ($checkVacancyDataResponse['redirectHas']) {
            return $checkVacancyDataResponse['redirect'];
        }

        $vacancy->update($vacancyData);
        $this->createManyToMany($vacancy, $vacancyData);

        return redirect()->route('platform.vacancy.edit', $vacancy);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $vacancyData              = $request->get('vacancy');
        $vacancyData['user_id']   = $user->id;
        $checkVacancyDataResponse = $this->checkVacancyData($vacancyData);
        if ($checkVacancyDataResponse['redirectHas']) {
            return $checkVacancyDataResponse['redirect'];
        }

        $vacancy = Vacancy::query()->create($vacancyData);
        $this->createManyToMany($vacancy, $vacancyData);

        return redirect()->route('platform.vacancy.index');
    }

    public function delete(Vacancy $vacancy): RedirectResponse
    {
        $vacancy->delete();

        return redirect()->route('platform.vacancy.index');
    }

    private function createManyToMany(
        Vacancy $vacancy,
        array $vacancyData
    ): void {
        $vacancy->employments()->sync($vacancyData['employments'] ?? []);
        $vacancy->charts()->sync($vacancyData['charts'] ?? []);
        $vacancy->softs()->sync($vacancyData['softs'] ?? []);
        $vacancy->hards()->sync($vacancyData['hards'] ?? []);
    }

    private function checkVacancyData(array $vacancyData): array
    {
        $redirectBack = $this->getRedirectBack($vacancyData);

        if (Str::length($vacancyData['title']) < 3) {
            Toast::error('Название вакансии должно содержать минимум 3 символа.');

            return [
                'redirectHas' => true,
                'redirect'    => $redirectBack,
            ];
        }
        if (Str::length($vacancyData['about']) < 3) {
            Toast::error('Описание вакансии должно содержать минимум 3 символа.');

            return [
                'redirectHas' => true,
                'redirect'    => $redirectBack,
            ];
        } elseif (Str::length($vacancyData['about']) > 10000) {
            Toast::error('Описание вакансии не может быть длиннее 10000 символов.');

            return [
                'redirectHas' => true,
                'redirect'    => $redirectBack,
            ];
        }
        if ($vacancyData['salary_from']
            > $vacancyData['salary_to']
        ) {
            Toast::error('Начальная зарплата не может быть больше конечной.');

            return [
                'redirectHas' => true,
                'redirect'    => $redirectBack,
            ];
        } elseif ($vacancyData['salary_from'] < 19242) {
            Toast::error('Начальная зарплата не может быть меньше 19242 рублей.');

            return [
                'redirectHas' => true,
                'redirect'    => $redirectBack,
            ];
        }

        return [
            'redirectHas' => false,
        ];
    }

    private function getRedirectBack(array $vacancyData): RedirectResponse
    {
        return redirect()->back()
            ->withInput([
                'vacancy.title'       => $vacancyData['title'],
                'vacancy.about'       => $vacancyData['about'],
                'vacancy.salary_from' => $vacancyData['salary_from'],
                'vacancy.salary_to'   => $vacancyData['salary_to'],
                'vacancy.employments' => $vacancyData['employments'],
                'vacancy.charts'      => $vacancyData['charts'],
                'vacancy.softs'       => $vacancyData['softs'] ?? [],
                'vacancy.hards'       => $vacancyData['hards'] ?? [],
                'vacancy.city_id'     => $vacancyData['city_id'],
            ]);
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
