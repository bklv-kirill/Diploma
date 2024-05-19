<?php

namespace App\Orchid\Screens;

use App\Models\Vacancy;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class VacancyIndexScreen extends Screen
{

    public $vacancies;

    public function query(): iterable
    {
        // TODO: Настроить права для создания/редактирования/удаление вакансий.
        // TODO: Добавить возможность удалять ваканс(ию/ии).
        // TODO: Добавить возможность редактировать вакансию.
        // TODO: Добавить сортировку и фильтрацию вакансий.

        $vacancies = Vacancy::query()->get();

        return [
            'vacancies' => $vacancies,
        ];
    }

    public function name(): ?string
    {
        return 'Вакансии';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Создать новую вакансию')
                ->icon('pencil')
                ->route('platform.vacancy.store'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('vacancies', [
                TD::make('id', 'Номер')
                    ->sort('id')
                    ->width('30px')
                    ->render(function (Vacancy $vacancy) {
                        return CheckBox::make('vacanciesIds[]')
                            ->value($vacancy->id)
                            ->checked(false);
                    }),
                TD::make('title', 'Название'),
                TD::make('salary_from', 'Зарплата (от / руб.)')
                    ->render(function (Vacancy $vacancy) {
                        return Label::make()
                            ->value(number_format($vacancy->salary_from, 0, '.',
                                ' '));
                    }),
                TD::make('salary_to', 'Зарплата (до / руб.)')
                    ->render(function (Vacancy $vacancy) {
                        return Label::make()
                            ->value(number_format($vacancy->salary_to, 0, '.',
                                ' '));
                    }),
                TD::make('city', 'Город')
                    ->render(function (Vacancy $vacancy) {
                        return Label::make()->value($vacancy->city->name);
                    }),
                TD::make('actions', 'Действия')
                    ->alignCenter()
                    ->width('100px')
                    ->render(function (Vacancy $vacancy) {
                        return DropDown::make()
                            ->icon('list')
                            ->list([
                                Link::make('Редактировать')
                                    ->route('platform.vacancy.edit', $vacancy),
                                Button::make('Удалить')
                                    ->method('deleteSingle',
                                        ['vacancyId' => $vacancy->id])
                                    ->confirm('Вы действительно хотите удалить вакансию?'),
                            ]);
                    }),
            ]),
        ];
    }

}
