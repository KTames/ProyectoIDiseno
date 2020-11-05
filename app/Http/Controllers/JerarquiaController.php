<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Http\Request;

class JerarquiaController extends Controller
{
    public function adminIndex() {
        session(['movimiento' => Movimiento::first()]);
        return view('admin.index', ['movimiento' => session('movimiento')]);
    }

    public function index() {
        return view('admin.jerarquia', [session('movimiento')->raiz()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Movimiento $movimiento) {
        $values = collect($request)->filter(
            function ($value, $key) {
                return substr($key, 0, 1) != "_" && trim($value ? $value : "") != "";
            }
        )->toArray();
        // $movimiento->nombre = "Hola mundo";

        //$movimiento->update(["nombre" => "Hola mundo"]);
        $movimiento->save();

        return back();
    }
}