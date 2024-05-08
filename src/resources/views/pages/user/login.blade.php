<x-auth-register-layout title="Авторизация">
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

            <x-auth-register-text :link="route('password.forgot')" linkTitle="Восстановить пароль"/>
            <x-auth-register-text beforeLink="У вас еще нет аккаунта? " :link="route('user.register')" linkTitle="Зарегестрироваться"/>
            <x-auth-register-text beforeLink="Вернуться на главную " :link="route('main')" linkTitle="страницу"/>
        </x-form>
    </div>
</x-auth-register-layout>
