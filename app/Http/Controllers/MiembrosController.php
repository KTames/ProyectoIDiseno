<?php

namespace App\Http\Controllers;

use App\Models\Miembro;

class MiembrosController extends Controller
{
    public function index() {
        return view('admin.miembros', ['miembros' => session('movimiento')->gestorMiembros()->obtenerCatalogo()->get()]);
    }

    public function delete(Miembro $miembro) {
        session('movimiento')->gestorMiembros()->deleteMiembro($miembro);
        return $this->index();
    }

    public function edit($id, $nuevosValores) {
        session('movimiento')->gestorMiembros()->actualizarDatosPersonales($id, $nuevosValores);
        return $this->index();
    }
    
}
