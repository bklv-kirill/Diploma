<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link type="image/x-icon" href="/images/logo.png" rel="shortcut icon">
    <script src="https://api-maps.yandex.ru/v3/?apikey=5988675f-55bd-492f-87c3-ead62bca4fd1&lang=ru_RU"></script>
    @vite(['resources/styles/app.scss', 'resources/js/app.js'])
</head>
<body>
<x-nav-bar />
<div class="main-content">
    {{ $slot }}
</div>
<div class="scroll-to-top-button hidden"></div>

<x-footer />
</body>
</html>
