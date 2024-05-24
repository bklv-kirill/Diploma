<div class="vacancy-list-item">
    <div class="vacancy-item">
        <h3>Название</h3>
        <p>- {!! $vacancy->title !!}</p>
    </div>

    <div class="vacancy-accordion-container">
        <div class="ac">
            <h2 class="ac-header">
                <button type="button" class="ac-trigger">Описание</button>
            </h2>
            <div class="ac-panel">
                <ul class="ac-text">
                    <li>{!! $vacancy->description !!}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="vacancy-item">
        <h3>Город</h3>
        <p>- {{ $vacancy->city->name }}</p>
    </div>

    <div class="vacancy-item">
        <h3>Зарплата (от / руб)</h3>
        <p>- {!! getMoney($vacancy->salary_from) !!}</p>
    </div>
    <div class="vacancy-item">
        <h3>Зарплата (до / руб)</h3>
        <p>- {!! getMoney($vacancy->salary_to) !!}</p>
    </div>

    <div class="vacancy-item">
        <h3>Тип занятости:</h3>
        <ul>
            @forelse($vacancy->employments as $employment)
                <li>- {{ $employment->name }}</li>
            @empty
                <p>- Информация отсутствует</p>
            @endforelse
        </ul>
    </div>

    <div class="vacancy-item">
        <h3>График работы:</h3>
        <ul>
            @forelse($vacancy->charts as $chart)
                <li>- {{ $chart->name }}</li>
            @empty
                <p>- Информация отсутствует</p>
            @endforelse
        </ul>
    </div>

    <div class="vacancy-item">
        <h3>Гибкие навыки:</h3>
        <ul>
            @forelse($vacancy->softs as $soft)
                <li>- {{ $soft->name }}</li>
            @empty
                <p>- Информация отсутствует</p>
            @endforelse
        </ul>
    </div>
    <div class="vacancy-item">
        <h3>Профессиональные навыки:</h3>
        <ul>
            @forelse($vacancy->hards as $hard)
                <li>- {{ $hard->name }}</li>
            @empty
                <p>- Информация отсутствует</p>
            @endforelse
        </ul>
    </div>

    @userIsVacancyOwner($user, $vacancy)
    <p class="vacancy-owned">Ваша вакансия</p>
    @else
        @userIsApplicant($user)
        <button @class([
'response-button',
'responded' => $user->responses()?->find($vacancy->id),
]) data-vacancy-id="{{ $vacancy->id }}">
            Откликнуться
        </button>
        @else

            @enduserIsApplicant
            @enduserIsVacancyOwner

</div>
