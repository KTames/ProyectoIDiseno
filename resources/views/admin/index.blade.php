@extends('layouts.horizontal-layout')

@section('links')
    <link rel="stylesheet" href="{{ mix('css/admin.index.css') }}">
@endsection

@section('content')
    <div class="mi-texto">
        Hola mundo
        <img src="{{ asset('img/logoTreeGarden.png') }}" alt="">
    </div>
@endsection
