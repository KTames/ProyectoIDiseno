<div class="recursive-block">
    {{-- <a class="no-style" data-toggle="collapse" href="#collapse{{ $nivelJerarquico->componente_id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
        <div class="toggle" >
            {{ $nivelJerarquico->nombre }} <img src="{{ asset('svg/triangle-right.svg') }}" alt="">
        </div>
    </a> --}}
    {{-- {{ $nivelJerarquico->componente_id }} --}}
    <a
        class="no-style"
        href="#"
        role="button"
        onclick="toggleCollapse({{ $nivelJerarquico->componente_id }})"
    >
        <div class="toggle" id="toggle{{ $nivelJerarquico->componente_id }}">
            {{ $nivelJerarquico->nombre }} <img src="{{ asset('svg/triangle-right.svg') }}" alt="">
        </div>
    </a>

    <a href="#">
        Editar miembros
    </a>
    <div class="collapse recursive-content" id="collapse{{ $nivelJerarquico->componente_id }}">
        @foreach ($nivelJerarquico->niveles() as $hijo)
            @include('admin.jerarquia.__recursive-block', ['nivelJerarquico' => $hijo->nivelJerarquico()->first()])
        @endforeach
    </div>
</div>
