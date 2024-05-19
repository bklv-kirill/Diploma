<x-main-layout title="Вакансии">
    <div class="vacancies-filter-sorting">
        <button class="applicants-sort-button" data-order-column="salary">По зарплате</button>
        <button class="applicants-sort-button" data-order-column="birthday">По возрасту</button>
    </div>

    <div class="vacancies">
        <div class="vacancies-filter-container">
            <div class="vacancies-filter">
                <form>
                    <div class="vacancies-filter-item">
                        <h3>Город</h3>
                        <div class="city-select">
                            <select name="city_id"></select>
                        </div>
                    </div>

                    <div class="vacancies-search-button">
                        <button>Поиск</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="vacancies-list">
        </div>
    </div>
</x-main-layout>
