<x-main-layout title="Часто задаваемые вопросы">
    <div class="faq">
        <div class="faq-title">
            <h2>Часто задаваемые вопросы</h2>
        </div>
        <div class="faq-accordion-container">
            <div class="ac">
                <h2 class="ac-header">
                    <button type="button" class="ac-trigger">Как разместить свою вакансию на сайте?</button>
                </h2>
                <div class="ac-panel">
                    <ul class="ac-text">
                        <li>- Размещение любой вакансии на сайте производит администратор. Что бы размсетить вакансию
                            вам необходимо связаться с нами по <a href="mailto:bklv.kirill@yandex.ru">почте</a>.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ac">
                <h2 class="ac-header">
                    <button type="button" class="ac-trigger">Как откликнуться на вакансию?</button>
                </h2>
                <div class="ac-panel">
                    <ul class="ac-text">
                        <li>- Откликаться на вакансии могут только зарегестрированные пользователи. Если у вас еще нет
                            аккаунта на сайте, вы можете
                            <a href="{{ route('user.login') }}">зарегестрировать</a> его за пару минут. Помните, что
                            шанс получить предложение о трудоустройстве выше, если у вас заполнен профиль.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ac">
                <h2 class="ac-header">
                    <button type="button" class="ac-trigger">Как сменить почту?</button>
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
                    <button type="button" class="ac-trigger">Как сменить номер телефона?</button>
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
                    <button type="button" class="ac-trigger">Как сменить дату рождения?</button>
                </h2>
                <div class="ac-panel">
                    <ul class="ac-text">
                        <li>- Вы так же можете сменить и дату рождения, которую ранее указывали при заполнении профеля.
                            Для этого необходимо необходимо
                            связаться с нами по <a href="mailto:bklv.kirill@yandex.ru">почте</a>.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="swiper faq-swiper">
            <div class="swiper-wrapper">
                @foreach($faqPhotosPaths as $faqPhotoPath)
                    <div class="swiper-slide">
                        <img
                            src="{{ asset('images/' . $faqPhotoPath) }}"
                            alt="">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</x-main-layout>
