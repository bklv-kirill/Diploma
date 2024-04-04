<x-auth-register-layout :title="'Авторизация'">
    <div class="wrapper">
        <h2>Авторизация</h2>
        <x-form :action="route('user.auth')" method="POST">
            <x-auth-register-input name="email" type="email" placeholder="Введите email" required/>
            <x-auth-register-input name="password" type="password" placeholder="Введите пароль" required/>

            <div class="remember-me">
                <input type="checkbox" name="remember_me" id="remember">
                <label for="remember"><h3>Запомнить меня</h3></label>
            </div>

            <div class="input-box button">
                <input type="submit" value="Войти">
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
