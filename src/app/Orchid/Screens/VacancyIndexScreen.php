<?php

namespace App\Orchid\Screens;

use App\Http\Filters\VacancyFilter;
use App\Models\City;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class VacancyIndexScreen extends Screen
{

    public function permission(): ?iterable
    {
        return [
            'vacancy.create',
        ];
    }

    public function query(Request $request): iterable
    {
        $filter    = new VacancyFilter($request->get('filter', []));
        $vacancies = Vacancy::filter($filter)->paginate(20);

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
                ->route('platform.vacancy.edit'),
        ];
    }

    public function delete(Request $request): RedirectResponse
    {
        $vacancy = Vacancy::query()->find($request->get('vacancyId'));

        abort_if(Gate::denies('update', $vacancy), 403);

        $vacancy->delete();

        return redirect()->route('platform.vacancy.index');
    }

    public function layout(): iterable
    {
        return [
            Layout::table('vacancies', [
                TD::make('id', 'Номер'),
                TD::make('title', 'Название')
                    ->filter(Input::make())
                    ->render(function (Vacancy $vacancy) {
                        return Link::make($vacancy->title)
                            ->route('platform.vacancy.edit', $vacancy);
                    }),
                TD::make('salary_from', 'Зарплата (от / руб.)')
                    ->filter(Input::make()->type('number'))
                    ->render(function (Vacancy $vacancy) {
                        return Label::make()
                            ->value(number_format($vacancy->salary_from, 0, '.',
                                ' '));
                    }),
                TD::make('salary_to', 'Зарплата (до / руб.)')
                    ->filter(Input::make()->type('number'))
                    ->render(function (Vacancy $vacancy) {
                        return Label::make()
                            ->value(number_format($vacancy->salary_to, 0, '.',
                                ' '));
                    }),
                TD::make('city', 'Город')
                    ->filter(Select::make()->fromModel(City::class, 'name')
                        ->empty('Город не выбран'))
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
                                    ->method('delete',
                                        ['vacancyId' => $vacancy->id])
                                    ->confirm('Вы действительно хотите удалить вакансию?'),
                            ]);
                    }),
            ]),
        ];
    }

}
