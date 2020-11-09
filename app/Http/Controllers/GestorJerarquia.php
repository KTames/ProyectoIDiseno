<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Grupo;
use App\Models\Miembro;
use App\Models\NivelJerarquico;
use App\Models\NivelPadre;

class GestorJerarquia
{
    private function createNivelJerarquico($nombre, $tipo = null, $params = [])
    {
        $componenteId = Componente::create([])->id;

        $nivel = NivelJerarquico::create([
            "nombre" => $nombre,
            "componente_id" => $componenteId
        ]);

        if ($tipo != null)
            app($tipo)::create($params + ["nivel_jerarquico_id" => $componenteId]);

        return $nivel;
    }

    public function crearNivelPadre(NivelJerarquico $nivelJerarquico, $nombre)
    {
        $nivel = $nivelJerarquico->concreto()->nivel + 1;
        $nuevoNivel = $this->createNivelJerarquico($nombre, NivelPadre::class, ['nivel' => $nivel, 'jefe_id' => 1]);
        $nivelJerarquico->hijos()->attach($nuevoNivel->componente);
    }

    public function borrar(NivelJerarquico $nivelJerarquico)
    {
//        dd($nivelJerarquico);

        $nivelJerarquico->hijos()->detach($nivelJerarquico->hijos()->get());

        $concreto = $nivelJerarquico->concreto();

        if ($concreto instanceof Grupo) {
            $concreto->jefes()->detach($concreto->jefes()->get());
        }


        foreach ($nivelJerarquico->niveles()->get() as $hijo) {
            $this->borrar($hijo->nivelJerarquico()->first());
        }

        $concreto->delete();
        $nivelJerarquico->delete();
    }

    public function crearGrupo($datos)
    {
        $nivelJerarquico = NivelJerarquico::where(['componente_id' => $datos["nivelJerarquico"]])->first();

        $nuevoNivel = $this->createNivelJerarquico($datos['nombre'], Grupo::class, ["numero_grupo" => $nivelJerarquico->niveles()->count() + 1]);

        $monitor1 = Miembro::where(['identificacion' => $datos["monitor1"]])->first();
        $nuevoNivel->concreto()->jefes()->attach($monitor1);

        if (isset($datos["monitor2"])) {
            $monitor2 = Miembro::where(['identificacion' => $datos["monitor2"]])->first();
            $nuevoNivel->concreto()->jefes()->attach($monitor2);
        }

        $nivelJerarquico->hijos()->attach($nuevoNivel->componente()->first());
    }

    private function crearTelefonos($arrayTelefonos)
    {
        return array_map(function ($telefono) {
            return ['numero' => $telefono];
        }, $arrayTelefonos);
    }

    public function inicializarMovimiento($movimiento, $datos)
    {
        $coordinacion = $this->createNivelJerarquico(
            $datos['nombreCoordinacion'],
            NivelPadre::class,
            ["nivel" => 1, "jefe_id" => 1]
        );

        $movimiento->root_id = $coordinacion->componente_id;
        $movimiento->telefonos()->createMany($this->crearTelefonos($datos['telefonos']));

        $movimiento->save();
    }

    public function obtenerMiembrosNoAsignados($rolesAsignados)
    {
        $asignados = [];

        foreach ($rolesAsignados as $rol)
            foreach ($rol as $miembro)
                $asignados[] = $miembro->componente_id;

        return Miembro::whereNotIn('componente_id', $asignados)->get();
    }

    public function obtenerMiembros($nivelId)
    {
        $nivelJerarquico = NivelJerarquico::where(['componente_id' => $nivelId])->first();
        $miembros = [];
        $concreto = $nivelJerarquico->concreto();

        if ($nivelJerarquico->concreto() instanceof Grupo) {
            // Es un grupo
            // $miembros = ["jefes" => [24, 53, 70], "monitores" => [], "miembros" => []]

            // buscar todos los miembros que no estén en jefes => array(miembros)

            $miembros["miembros"] =
                $nivelJerarquico->miembros()->whereNotIn('componente_id', $concreto->jefes()->pluck('componente_id'))->get();

            $miembros["miembros"] = $miembros["miembros"]->map(function ($miembro) {
                return $miembro->concreto();
            });

            $miembros["monitores"] =
                $concreto->jefes()->whereNotIn('componente_id', $nivelJerarquico->miembros()->pluck('componente_id'))->get();

            $miembros["jefes"] =
                $concreto->jefes()->whereIn('componente_id', $nivelJerarquico->miembros()->pluck('componente_id'))->get();

            // buscar todos los jefes que no estén en miembros => monitores
            // buscar todos los jefes que estén en miembros => jefes
        } else {
            // Es un nivel padre

            // Un jefe es un miembro normal de su nivel jerarquico
            // Los miembros son los JEFES de todos los niveles hijos del nivel jerarquico
            // (hay que ver si, de los grupos, solamente los monitores son miembros de las ramas. En este caso, para cada nivel
            // jerárquico hijo, hay que preguntar si es un NivelPadre o un Grupo, y si es Grupo, mostrar solamente los monitores y no los jefes)

            $miembros["jefes"] =
                $nivelJerarquico->miembros()->whereIn('componente_id', $nivelJerarquico->miembros()->pluck('componente_id'))->get();

            $miembros["monitores"] = [];

            $miembros["miembros"] = [];
                foreach($nivelJerarquico->niveles()->get() as $subNivel){

                    $subArray = $this->obtenerMiembros($subNivel['id']);

                    $miembros["miembros"] = array_where($subArray,'miembros');
            }

        }
        dd($miembros);

        return $miembros;
    }

}
