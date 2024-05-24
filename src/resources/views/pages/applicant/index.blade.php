<x-main-layout title="Соискатели">
    <div class="filter-sorting">
        <button class="sort-button" data-order-column="salary">По зарплате</button>
        <button class="sort-button" data-order-column="birthday">По возрасту</button>
    </div>

    <div class="applicants">
        <div class="filter-container">
            <div class="filter">
                <form>
                    <div class="filter-item">
                        <h3>Город</h3>
                        <div class="city-select">
                            <select name="city_id"></select>
                        </div>
                    </div>

                    <div class="filter-item from-to">
                        <h3>Поиск по описанию</h3>
                        <input type="text" name="search_description">
                    </div>

                    <div class="filter-item from-to">
                        <h3>Возраст</h3>
                        <input type="number" name="age_from" placeholder="От">
                        <input type="number" name="age_to" placeholder="До">
                    </div>

                    <div class="filter-item select">
                        <h3>Тип занятости</h3>
                        @foreach($employments as $employment)
                            <div>
                                <input type="checkbox" name="employments[]" id="{{ $employment->slug }}"
                                       value="{{ $employment->id }}">
                                <label for="{{ $employment->slug }}">{{ $employment->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="filter-item select">
                        <h3>График работы</h3>
                        @foreach($charts as $chart)
                            <div>
                                <input type="checkbox" name="charts[]" id="{{ $chart->slug }}"
                                       value="{{ $chart->id }}">
                                <label for="{{ $chart->slug }}">{{ $chart->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="filter-item">
                        <h3>Гибкие навыки</h3>
                        <div class="softs">
                            <select name="softs[]" multiple></select>
                        </div>
                    </div>

                    <div class="filter-item">
                        <h3>Профессиональные навыки</h3>
                        <div class="hards">
                            <select name="hards[]" multiple></select>
                        </div>
                    </div>

                    <div class="filter-item select">
                        <h3>Образование</h3>
                        <div>
                            <input type="checkbox" name="education[]" id="universities"
                                   value="universities">
                            <label for="universities">Высшее</label>
                        </div>
                        <div>
                            <input type="checkbox" name="education[]" id="collages"
                                   value="collages">
                            <label for="collages">Среднее профессиональное</label>
                        </div>
                    </div>

                    <div class="filter-item from-to">
                        <h3>Желаемая зарплата</h3>
                        <input type="number" name="salary_from" placeholder="От">
                        <input type="number" name="salary_to" placeholder="До">
                    </div>

                    @auth
                        <input type="hidden" id="currentAuthUserId" name="current_auth_user_id" value="{{ auth()->user()?->id }}">
                    @endauth
                    <div class="search-button">
                        <button>Поиск</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="list">
        </div>
    </div>
</x-main-layout>
