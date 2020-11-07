<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;

class GestorJerarquia
{

    public function createMovimiento(Request $request){

        $request->validate([
            'cedulaJuridica'=>'required',
            'nombre'=>'required'
        ]);
        
        $movimiento = new Movimiento([
            'cedulaJuridica' => $request->get('cedulaJuridica'),
            'nombre' => $request->get('nombre'),
            'direccionWeb' => $request->get('dirWeb'),
            'sennas' => $request->get('dirFisica'),
            'logo' => $request->get('cedulaJuridica'),
            'pais' => $request->get('country'),
            'provincia' => $request->get('provincia'),
            'canton' => $request->get('canton'),
            'distrito' => $request->get('distrito'),
        ]);
        $movimiento->save();
 
        return redirect()->route('movimientos.index');
    }


}
