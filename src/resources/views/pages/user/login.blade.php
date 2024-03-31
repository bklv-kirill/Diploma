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
        @error('email')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="email" name="email" class="@error('email') auth-invalid @enderror"
                   placeholder="Введите email" value="{{ old('email') }}" required>
        </div>

        @error('password')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="password" name="password" class="@error('password') auth-invalid @enderror"
                   placeholder="Введите пароль" required>
        </div>

        <div class="remember-me">
            <input type="checkbox" name="remember_me">
            <h3>Запомнить меня</h3>
        </div>

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
