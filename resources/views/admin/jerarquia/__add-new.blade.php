@if(!$groupsOnly)
    <form action="
{{--        {{ route('jerarquia.crearNivelJerarquico') }} --}}
        " class="d-flex align-items-center">
        <input type="text" class="input-shadow" name="nombre" id="" placeholder="Nuevo nombre">
        <button type="submit" class="ml-4 btn btn-primary btn-green-moon">Crear nuevo</button>
    </form>
@else
    <form action="">
        <button type="submit" class="btn btn-primary btn-green-moon">Crear nuevo</button>
    </form>
@endif

{{--
<boton onclick="funcionMostrarModal({{ $miembro->componente_id  }})" >

<form action="{{  route('editarMiembro') }}">
<input hidden name="miembroId">
</form>

<script>

function mostrarModal(identificador) {
    modal.miembroId.value = identificador;

PHP
public function editarMiembro(Request $request) {
    $miembro = Miembro::where(['id' => $request->miembroId]);
    
    // Obtener todos menos el id y los que son nulos guardarlos en $datosAEditar
     
     session('movimiento')->gestorMiembros()->editarMiembro($miembro, $datosAEditar);

     return back();
}

function editarMiembro($miembro, $nuevosValores) {
    foreach ($datosAEditar as $atributo => $nuevoValor)
        $miembro[$atributo] = $nuevoValor;
      
    $miembro->save();
}

}
--}}
