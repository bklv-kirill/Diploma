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
        @error('first_name')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="text" name="first_name" class="@error('first_name') auth-invalid @enderror"
                   placeholder="Введите имя" value="{{ old('first_name') }}" required>
        </div>

        @error('second_name')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="text" name="second_name" class="@error('second_name') auth-invalid @enderror"
                   placeholder="Введите фамилию" value="{{ old('second_name') }}" required>
        </div>

        @error('patronymic')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="text" name="patronymic" class="@error('patronymic') auth-invalid @enderror"
                   placeholder="Введите отчество" value="{{ old('patronymic') }}" required>
        </div>

        @error('email')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="text" name="email" class="@error('email') auth-invalid @enderror"
                   placeholder="Введите email" value="{{ old('email') }}" required>
        </div>

        @error('password')
        <span>{{ $message }}</span>
        @enderror
        <div class="input-box">
            <input type="password" name="password" class="@error('password') auth-invalid @enderror"
                   placeholder="Введите пароль" required>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation"
                   class="@error('password') auth-invalid @enderror" placeholder="Подтвердите пароль" required>
        </div>

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
