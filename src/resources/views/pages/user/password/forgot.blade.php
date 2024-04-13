<x-auth-register-layout :title="'Восстановление пароля'">
    <div class="wrapper">
        <h2>Восстановление пароля</h2>
        <x-form :action="route('password.send-reset-link')" method="POST">
            <x-auth-register-input name="email" type="email" placeholder="Введите email" required/>

            <div class="input-box button">
                <input type="submit" value="Восстановить пароль">
            </div>

            <div class="text">
                <h3>Вспомнили пароль? <a href="{{ route('user.login') }}">Авторизоваться</a></h3>
            </div>
            <div class="text">
                <h3>У вас еще нет аккаунта? <a href="{{ route('user.register') }}">Зарегестрироваться</a></h3>
            </div>
            <div class="text">
                <h3>Вернуться на главную <a href="{{ route('main') }}">страницу</a></h3>
            </div>

        </x-form>
    </div>
</x-auth-register-layout>
