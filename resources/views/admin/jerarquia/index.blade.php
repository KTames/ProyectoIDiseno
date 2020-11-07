@extends('layouts.horizontal-layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/jerarquia.css') }}">
@endsection

@section('content')
    <div class="p-3 d-flex flex-column h-100">
        <h2 class="nunito-bold">Jerarquía del movimiento</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem sit ad vero repudiandae excepturi rerum, at quas, error deserunt tempore neque laboriosam veniam quae, a nam dolore dolorum sapiente. Quas?</p>

        <div class="jerarquia">
{{--            @foreach (session('movimiento')->raiz()->nivelJerarquico() as $hijo)--}}
{{--            @include('admin.jerarquia.__recursive-block', ['nivelJerarquico' => $hijo->nivelJerarquico()->first(), 'groupsOnly' => false])--}}
                @include('admin.jerarquia.__recursive-block', ['nivelJerarquico' => session('movimiento')->raiz(), 'groupsOnly' => false])
{{--            @endforeach--}}
        </div>
    </div>

    <script>
        function toggleCollapse(id) {
            $("#toggle" + id).toggleClass('flip-triangle');
            $("#collapse" + id).toggleClass('collapse');
        }
    </script>
@endsection
