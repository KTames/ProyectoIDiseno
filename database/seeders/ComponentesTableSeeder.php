<?php

namespace Database\Seeders;

use App\Models\Componente;
use App\Models\Grupo;
use App\Models\NivelJerarquico;
use App\Models\NivelPadre;
use Illuminate\Database\Seeder;

class ComponentesTableSeeder extends Seeder
{
    private function createNivelJerarquico($nombre, $tipo = null, $params = []) {
        $nivel = NivelJerarquico::create([
            "nombre" => $nombre,
            "componente_id" => Componente::create([])->id
        ]);

        if ($tipo != null)
            app($tipo)::create($params + ["nivel_jerarquico_id" => $nivel->componente_id]);

        return $nivel;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coordinacion = $this->createNivelJerarquico(
            "Coordinación CR",
            NivelPadre::class,
            ["nivel" => 1, "jefe_id" => 1]
        );

        $zona1 = $this->createNivelJerarquico("Zona 1",
            NivelPadre::class,
            ["nivel" => 2, "jefe_id" => 2]
        );
        $coordinacion->hijos()->attach($zona1->componente);

        $zona2 = $this->createNivelJerarquico("Zona 2",
            NivelPadre::class,
            ["nivel" => 2, "jefe_id" => 3]
        );
        $coordinacion->hijos()->attach($zona2->componente);

        $rama1 = $this->createNivelJerarquico("Rama 1",
            NivelPadre::class,
            ["nivel" => 3, "jefe_id" => 4]);
        $zona1->hijos()->attach($rama1->componente);

        $rama2 = $this->createNivelJerarquico("Rama 2",
            NivelPadre::class,
            ["nivel" => 3, "jefe_id" => 5]);
        $zona1->hijos()->attach($rama2->componente);

        $grupo1 = $this->createNivelJerarquico("Grupo 1",
            Grupo::class,
            ["numero_grupo" => 1]);
        $rama1->hijos()->attach($grupo1->componente);

        $grupo2 = $this->createNivelJerarquico("Grupo 2",
            Grupo::class,
            ["numero_grupo" => 2]);
        $rama1->hijos()->attach($grupo2->componente);

    }
}
