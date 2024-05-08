<x-auth-register-layout title="Восстановление пароля">
    <div class="wrapper">
        <h2>Восстановление пароля</h2>
        <x-form :action="route('password.send-reset-link')" method="POST">
            <x-auth-register-input name="email" type="email" placeholder="Введите email" required/>

            <div class="input-box button">
                <input type="submit" value="Восстановить пароль">
            </div>

            <x-auth-register-text :link="route('user.login')" linkTitle="Авторизоваться"/>
            <x-auth-register-text beforeLink="У вас еще нет аккаунта? " :link="route('user.register')" linkTitle="Зарегестрироваться"/>
            <x-auth-register-text beforeLink="Вернуться на главную " :link="route('main')" linkTitle="страницу"/>
        </x-form>
    </div>
</x-auth-register-layout>
