<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <a href="{{ route('main') }}">
                <img src="{{ asset('/images/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="footer-column">
            <span>Полезные ссылки</span>
            <ul>
                <li><a href="">Вакансии</a></li>
                <li><a href="{{ route('applicant.index') }}">Соискатели</a></li>
                <li><a href="{{ route('faq') }}">F.A.Q</a></li>
                <li><a href="{{ route('user.profile') }}">Личный кабинет</a></li>
                <li><a href="mailto:bklv.kirill@yandex.ru">Наша почта</a></li>
            </ul>
        </div>
    </div>
</footer>
