<?php

namespace App\Http\Controllers;

use App\Models\Miembro;

class MiembrosController extends Controller
{
    public function index() {
        $miembros = Miembro::all();
        return view('admin.miembros', compact('miembros'));
    }
}
