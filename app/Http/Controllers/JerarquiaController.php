<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
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
                // return $key != "componente_id" && trim($value ? $value : "") != "";
            }
        )->toArray();

        foreach ($values as $key => $value)
            $movimiento[$key] = $value;

        $movimiento->save();

        return back();
    }
}
