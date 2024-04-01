<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    @vite('resources/scss/pages/user/auth-register.scss')
</head>
<body>
<div class="wrapper">
    <h2>Регистрация</h2>
    <x-form :action="route('user.store')" method="POST">
        <x-auth-register-input name="first_name" type="text" placeholder="Введите имя" required/>
        <x-auth-register-input name="second_name" type="text" placeholder="Введите фамилию" required/>
        <x-auth-register-input name="patronymic" type="text" placeholder="Введите отчество" required/>
        <x-auth-register-input name="email" type="email" placeholder="Введите email" required/>
        <x-auth-register-input name="password" type="password" placeholder="Введите пароль" required/>
        <x-auth-register-input name="password_confirmation" type="password" placeholder="Введите пароль"/>

        <div class="input-box button">
            <input type="submit" value="Зарегестрироваться">
        </div>

        <div class="text">
            <h3>Уже есть аккаунт? <a href="{{ route('user.login') }}">Авторизироваться</a></h3>
        </div>
        <div class="text">
            <h3>Вернуться на главную <a href="{{ route('main') }}">страницу</a></h3>
        </div>
    </x-form>
</div>
</body>
</html>
