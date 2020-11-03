<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Proyecto I Diseño</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/horizontal-layout.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body>

<div class="vertical-navbar">
    <img src="{{ asset('img/logo.png') }}" alt="">
    <div class="items">
        <ul>
            <li>
                Hola
            </li>
            <li>
                Mundo
            </li>
        </ul>
    </div>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
