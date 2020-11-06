<?php

namespace App\Http\Controllers;

use App\Models\Miembro;

class MiembrosController extends Controller
{
    public function index() {
        return view('admin.miembros', ['miembros' => session('movimiento')->gestorMiembros()->obtenerCatalogo()->get()]);
    }

    public function delete(Miembro $miembro) {
        dd($miembro);
        session('movimiento')->gestorMiembros()->deleteMiembro($miembro);
        return back();
    }
}
