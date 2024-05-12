<x-main-layout title="Главная страница">
    <div class="main">
        <div class="main-title">
            <h1>С нами "<span>Трудный</span>" выбор станет <span>легче</span>!</h1>
        </div>

        <div class="swiper main-swiper">
            <div class="swiper-wrapper">
                @foreach($mainPhotosPaths as $mainPhotoPath)
                    <div class="swiper-slide">
                        <img
                            src="{{ asset('images/' . $mainPhotoPath) }}"
                            alt="">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="main-content">
            <div class="main-content-title">
                <h2>
                    Мы поможем найти <span>соискателям</span> работу, а <span>работодателю</span> подходящего
                    сотрудника!
                </h2>
            </div>

            <div class="main-accordion-container">
                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">Размещайте свои вакансии!</button>
                    </h2>
                    <div class="ac-panel">
                        <ul class="ac-text">
                            <li>- Вы можете разместить информацию о вакансиях вашей компании, чтобы
                                привлечь талантливых специалистов. Заполните необходимые поля, укажите требования к
                                кандидатам и ожидаемые условия работы. Также не забудьте добавить контактные данные для
                                связи. Это отличный способ найти идеального сотрудника!
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">Откликайтесь на вакансии работодателей!</button>
                    </h2>
                    <div class="ac-panel">
                        <ul class="ac-text">
                            <li>- Выбирайте интересующие предложения, ознакомьтесь с требованиями и условиями работы, и
                                оставляйте свои отклики непосредственно работодателям. Здесь вы можете
                                продемонстрировать свои профессиональные навыки и опыт, а также узнать больше о
                                потенциальных работодателях и карьерных возможностях.
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">Анализируйте рынок труда!</button>
                    </h2>
                    <div class="ac-panel">
                        <ul class="ac-text">
                            <li>- Изучайте текущих тенденций и статистики рынка труда. Здесь вы найдете анализ спроса и
                                предложения по различным профессиям, средние зарплаты в разных отраслях и другую
                                полезную информацию. Это поможет вам понять, какие навыки востребованы и какие вакансии
                                стоит открывать в вашей компании.
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">Находите для себя лучшие предложения!</button>
                    </h2>
                    <div class="ac-panel">
                        <ul class="ac-text">
                            <li>- Здесь вы найдете множество предложений о работе от ведущих компаний. Используйте
                                удобные фильтры для поиска вакансий по ключевым словам, отраслям или географическому
                                положению. Выберите подходящую вакансию, ознакомьтесь с деталями и требованиями, и
                                оставьте свой отклик. Это ваш шанс начать карьеру мечты или
                                сделать следующий шаг в профессиональном росте!
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ymap-wrapper">
                <h2>Ищите <span>работу</span> или <span>сотрудников</span> из любой точки <span>страны</span>!</h2>
                <div class="ymap-container"></div>
            </div>
            <script>
                let ymapCoords = {'geo_lat': 57.1522, 'geo_lon': 65.5272};
                let ymapZoom = 3;
            </script>
        </div>
    </div>
</x-main-layout>
