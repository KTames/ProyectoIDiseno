<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Proyecto I Diseño</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/welcome.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    </head>
    <body>
        <div class="img-header mb-3">
            <img src="{{ asset('img/tree-main.jpg') }}" alt="Árbol">

            <div class="content d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                    <h1 class="text-white display-4">GroupTree</h1>
                </div>
                <div>
                    <a href="{{ route('welcome') }}" class="btn btn-primary mt-4 shadow">Administrar</a>
                </div>
            </div>
        </div>

        <div class="row mx-0 my-5">
            <div class="col-md-6 col-sm-12">
                @include('welcome.__text-item', [
                    'title' => 'Maneja tu jerarquía',
                    'text' => 'GroupTree te permite agregar, editar, y eliminar niveles de tu estructura jerárquica.',
                    'svgImage' => 'software_engineer'
                ])
            </div>
            <div class="col-md-6 col-sm-12">
                @include('welcome.__text-item', [
                    'title' => 'Administra miembros',
                    'text' => 'Con GroupTree puedes manejar información personal de los miembros de tu grupo, y asignarlos a distintos roles en tu movimiento.',
                    'svgImage' => 'team_management'
                ])
            </div>
        </div>
    </body>
</html>
