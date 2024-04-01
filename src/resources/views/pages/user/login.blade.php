<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    @vite('resources/scss/pages/user/auth-register.scss')
</head>
<body>
<div class="wrapper">
    <h2>Авторизация</h2>
    <x-form :action="route('user.auth')" method="POST">
        <x-auth-register-input name="email" type="email" placeholder="Введите email" required/>
        <x-auth-register-input name="password" type="password" placeholder="Введите пароль" required/>

        <div class="input-box button">
            <input type="submit" value="Войти">
        </div>

        <div class="text">
            <h3>У вас еще нет аккаунте? <a href="{{ route('user.register') }}">Зарегестрироваться</a></h3>
        </div>
        <div class="text">
            <h3>Вернуться на главную <a href="{{ route('main') }}">страницу</a></h3>
        </div>
    </x-form>
</div>
</body>
</html>
