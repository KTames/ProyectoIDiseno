<?php

namespace App\Http\Controllers;
use App\Models\Miembro;
use App\Models\NivelJerarquico;
use Illuminate\Http\Request;

class GestorMiembro{

    public function actualizarDatosPersonales(Miembro $miembro, $nuevosDatosPersonales) {
        foreach ($nuevosDatosPersonales as $dato => $nuevoValor)
            $miembro[$dato] = $nuevoValor;

        $miembro->save();
    }

    public function obtenerMiembrosNivel(NivelJerarquico $nivel) {
        // $nivel->hijos()
    }

    public function obtenerCatalogo(){
        return Miembro::where(['enabled' => 1]);
    }

    public function deleteMiembro(Miembro $miembro){
        $miembro->enabled = false;
        $miembro->save();

        return redirect()->route('miembros.index');
    }
}
