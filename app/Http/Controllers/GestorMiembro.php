<?php

namespace App\Http\Controllers;
use App\Models\Componente;
use App\Models\Grupo;
use App\Models\Miembro;
use App\Models\NivelJerarquico;
use Illuminate\Http\Request;

class GestorMiembro{

    public function obtenerCatalogo($filtro = null){
        if ($filtro == null)
            return Miembro::where(['enabled' => 1])->orderBy('created_at', 'DESC');
        else {
            $query = Miembro::where(['enabled' => 1]);
            if ($filtro["filtro"] === "identificacion")
                $query = $query->where(["identificacion" => $filtro["valor"]]);
            else
                $query = $query->where($filtro["filtro"], "like", "%" . $filtro["valor"] . "%");

            return $query->orderBy('created_at', 'DESC');
        }
    }

    public function deleteMiembro(Miembro $miembro){
        $miembro->enabled = false;
        $miembro->save();

        return redirect()->route('miembros.index');
    }

    public function crearMiembro($data) {
        $componenteId = Componente::create([])->id;
        Miembro::create($data + ["componente_id" => $componenteId]);
    }

    public function actualizarDatosPersonales($idMiembro, $nuevosDatosPersonales) {
        $miembro = Miembro::where(['componente_id' => $idMiembro])->first();
        foreach ($nuevosDatosPersonales as $dato => $nuevoValor)
            $miembro[$dato] = $nuevoValor;
        $miembro->save();
    }

    public function posicionMiembroJerarquia(Miembro $miembro){
        $posicionesJerarquia = [];

        $niveles = $miembro->niveles();
        
        $gruposACargo = $miembro->gruposACargo();
        
        $noGrupoACargo = $niveles->whereNotIn('componente_id', $gruposACargo->pluck('nivel_jerarquico_id'));
        dd($gruposACargo->get()->map(function ($e) { return $e->nivelJerarquico()->first(); }));
        
        foreach ($noGrupoACargo->get() as $nivel)
        {
            $concreto = $nivel->concreto();
            
            if ($concreto instanceof Grupo) {
                
            }
        }

        dd($niveles->get());
        return $posicionesJerarquia;
    }
}
