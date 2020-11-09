<div class="recursive-block">
    @if(!($nivelJerarquico->concreto() instanceof \App\Models\Grupo))
    <a
        class="no-style"
        href="#"
        role="button"
        onclick="toggleCollapse({{ $nivelJerarquico->componente_id }})"
    >
        <div class="toggle inline-toggle" id="toggle{{ $nivelJerarquico->componente_id }}">
            {{ $nivelJerarquico->nombre }} <img src="{{ asset('svg/triangle-right.svg') }}" alt="">
        </div>
        @isset($showEditMembers)
            <a href="#">
                Editar miembros
            </a>
        @endisset
    </a>
    @else
        <div class="inline-toggle">
            {{ $nivelJerarquico->nombre }} <a href="#" class="ml-4">
                Editar miembros
            </a>
        </div>
    @endif
    <div class="collapse recursive-content" id="collapse{{ $nivelJerarquico->componente_id }}">
        @foreach ($nivelJerarquico->niveles() as $hijo)
            @include('admin.jerarquia.__recursive-block', ['nivelJerarquico' => $hijo->nivelJerarquico()->first(), 'groupsOnly' => $hijo->concreto()->nivel >= 3, 'showEditMembers' => true]->get())
        @endforeach

        @include('admin.jerarquia.__add-new', compact('nivelJerarquico', 'groupsOnly'))
    </div>
</div>
