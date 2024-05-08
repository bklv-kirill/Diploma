<x-main-layout title="Соискатели">
    <div class="applicants">
        <div class="applicants-container">
            <div class="applicants-filter">
                <div class="applicants-filter-item">
                    <h3>Город проживания</h3>
                    <div class="city-select">
                        <select name="city_id"></select>
                    </div>
                </div>

                <div class="applicants-filter-item from-to">
                    <h3>Возраст</h3>
                    <input style="width: 100%" id="a" type="number" placeholder="От">
                    <input style="width: 100%" id="b" type="number" placeholder="До">
                </div>

                <div class="applicants-filter-item select">
                    <h3>Тип занятости</h3>
                    @foreach($employments as $employment)
                        <div>
                            <input type="checkbox" name="employments[]" id="{{ $employment->slug }}"
                                   value="{{ $employment->id }}">
                            <label for="{{ $employment->slug }}">{{ $employment->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="applicants-filter-item select">
                    <h3>График работы</h3>
                    @foreach($charts as $chart)
                        <div>
                            <input type="checkbox" name="charts[]" id="{{ $chart->slug }}"
                                   value="{{ $chart->id }}">
                            <label for="{{ $chart->slug }}">{{ $chart->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="applicants-filter-item">
                    <h3>Гибкие навыки</h3>
                    <div class="softs">
                        <select name="softs[]" multiple></select>
                    </div>
                </div>
                <div class="applicants-filter-item">
                    <h3>Профессиональные навыки</h3>
                    <div class="hards">
                        <select name="hards[]" multiple></select>
                    </div>
                </div>

                <div class="applicants-filter-item select">
                    <h3>Образование</h3>
                    <div>
                        <input type="checkbox" name="hight" id="hight"
                               value="{{ $employment->id }}">
                        <label for="hight">Высшее</label>
                    </div>
                    <div>
                        <input type="checkbox" name="middle" id="middle"
                               value="{{ $employment->id }}">
                        <label for="middle">Среднее</label>
                    </div>
                </div>

                <div class="applicants-filter-item from-to">
                    <h3>Желаемая зарплата</h3>
                    <input style="width: 100%" id="a" type="number" placeholder="От">
                    <input style="width: 100%" id="b" type="number" placeholder="До">
                </div>

                <button>Поиск</button>
            </div>
            <div class="applicants-list">test</div>
        </div>
    </div>
</x-main-layout>
