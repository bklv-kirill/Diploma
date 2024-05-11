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
                    Мы поможем найти <span>соискателям</span> работу, а <span>работадателю</span> подходящего
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
                            <li>- Откликаться на вакансии могут только зарегестрированные пользователи. Если у вас еще
                                нет
                                аккаунта на сайте, вы можете
                                <a href="{{ route('user.login') }}">зарегестрировать</a> его за пару минут. Помните, что
                                шанс получить предложение о трудоустройстве выше, если у вас заполнен профиль.
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger">Откликайтесь на вакансии работадателей!</button>
                    </h2>
                    <div class="ac-panel">
                        <ul class="ac-text">
                            <li>- Для того что бы сменить почту в случае ее утери или по другим причинам вам необходимо
                                связаться с нами по <a href="mailto:bklv.kirill@yandex.ru">почте</a>.
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
                            <li>- Для того что бы сменить номер телефона в случае его утери или по другим причинам вам
                                необходимо
                                связаться с нами по <a href="mailto:bklv.kirill@yandex.ru">почте</a>.
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
                            <li>- Вы так же можете сменить и дату рождения, которую ранее указывали при заполнении
                                профеля.
                                Для этого необходимо необходимо
                                связаться с нами по <a href="mailto:bklv.kirill@yandex.ru">почте</a>.
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
