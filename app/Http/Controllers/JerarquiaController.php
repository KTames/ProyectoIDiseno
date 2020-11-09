<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\NivelJerarquico;
use Illuminate\Http\Request;

class JerarquiaController extends Controller
{
    public function adminIndex(Movimiento $movimiento = null) {
        if ($movimiento !== null)
            session(['movimiento' => $movimiento]);
        return view('admin.index', ['movimiento' => session('movimiento')]);
    }

    public function index() {
        return view('admin.jerarquia.index', [session('movimiento')->raiz()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Movimiento $movimiento) {
        // ["nombre" => "Mi movimiento", "cedulaJuridica" => null]
        // Collection
        $values = collect($request)->filter(
            function ($value, $key) {
                return substr($key, 0, 1) != "_" && trim($value ? $value : "") != "";
            }
        )->toArray();

        foreach ($values as $key => $value)
            $movimiento[$key] = $value;

        $movimiento->save();

        return back();
    }

    public function crearNivelPadre(Request $request, NivelJerarquico $nivelJerarquico) {
        $request->validate([
            'nombre' => 'required'
        ]);

        session('movimiento')->gestorJerarquia()->crearNivelPadre($nivelJerarquico, $request->nombre);

        return back();
    }
    
    public function crearGrupo(Request $request) {
        $data = [];
        if (trim($request->monitor2 ?? "") !== "")
            $data = $request->validate([
                "monitor1" => "required|exists:miembros,identificacion",
                "monitor2" => "exists:miembros,identificacion",
                "nombre" => "required",
                "nivelJerarquico" => "required"
            ]);
        else
            $data = $request->validate([
                "monitor1" => "required|exists:miembros,identificacion",
                "nombre" => "required",
                "nivelJerarquico" => "required"
            ]);
        
        session('movimiento')->gestorJerarquia()->crearGrupo($data);
        
        return back();
    }
    
    public function delete(NivelJerarquico $nivelJerarquico) {
        session('movimiento')->gestorJerarquia()->borrar($nivelJerarquico);
        return back();
    }

    public function crearMovimiento(Request $request) {
        $datosMovimiento = $request->validate(
            [
                'cedulaJuridica' => 'required',
                'nombre' => 'required',
                'direccionWeb' => 'required',
                'sennas' => 'required',
                'logo' => 'required',
                'telefonos' => 'required',
                'nombreCoordinacion' => 'required',
                'pais' => 'required',
                'provincia' => 'required',
                'canton' => 'required',
                'distrito' => 'required']
        );

        $telefonos = collect($request["telefonos"])->filter(function ($value) {
            return trim($value != null ? $value : "") !== "";
        });

        \Validator::validate(["telefonos" => $telefonos], ["telefonos.0" => "required"], ["telefono.0.required" => "Ingrese al menos un número de teléfono"]);
        
        $movimiento = Movimiento::create($datosMovimiento);
        $movimiento->inicializar($datosMovimiento);

        return back();
    }
    
    public function verMiembros(NivelJerarquico $nivelJerarquico) {
        $miembros = session('movimiento')->gestorJerarquia()->obtenerMiembros($nivelJerarquico);
        $miembros["ninguno"] = session('movimiento')->gestorJerarquia()->obtenerMiembrosNoAsignados($nivelJerarquico);
        
        dd(compact('nivelJerarquico', 'miembros'));
        return view('admin.jerarquia.edit-miembros', compact('nivelJerarquico', 'miembros'));
    }

}
