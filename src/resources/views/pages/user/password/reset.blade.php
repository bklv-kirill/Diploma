<x-auth-register-layout :title="'Сброс пароля'">
    <div class="wrapper">
        <h2>Сброс пароля</h2>
        <x-form :action="route('password.update')" method="POST">
            <input type="hidden" name="token" value="{{ $token }}">
            <x-auth-register-input name="email" type="email" placeholder="Введите email" required/>
            <x-auth-register-input name="password" type="password" placeholder="Введите новый пароль" required/>
            <x-auth-register-input name="password_confirmation" type="password" placeholder="Подтвердите новый пароль"/>

            <div class="input-box button">
                <input type="submit" value="Восстановить пароль">
            </div>
        </x-form>
    </div>
</x-auth-register-layout>
