<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->filtro))
            return view('admin.miembros', ['miembros' => session('movimiento')->gestorMiembros()->obtenerCatalogo($request->all())->get(), 'filtro' => $request->all()]);

        return view('admin.miembros', ['miembros' => session('movimiento')->gestorMiembros()->obtenerCatalogo()->get()]);
    }

    public function delete(Miembro $miembro)
    {
        session('movimiento')->gestorMiembros()->deleteMiembro($miembro);
        return $this->index();
    }

    public function edit(Request $request)
    {
        $nuevosValores = collect($request)->filter(function ($value, $key) {
            return substr($key, 0, 1) != "_" && $key != "miembro";
        })->toArray();

        session('movimiento')->gestorMiembros()->actualizarDatosPersonales(intval($request->miembro), $nuevosValores);
        return $this->index();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            "identificacion" => "required",
            "nombreCompleto" => "required",
            "email" => "required",
            "provincia" => "required",
            "telefono" => "required",
            "canton" => "required",
            "distrito" => "required",
            "sennas" => "required"]);

        session('movimiento')->gestorMiembros()->crearMiembro($data);

        return back();
    }

}
