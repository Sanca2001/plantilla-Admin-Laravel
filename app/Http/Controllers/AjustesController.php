<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjustesController extends Controller
{

    public function index()
    {
        return view('admin.ajustes.index');
    }
    

    public function store(Request $request)
    {
        //validar los datos
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'direccion_empresa' => 'required|string|max:255',
            'telefono_empresa' => 'required|string|max:255',
            'correo_empresa' => 'required|string|max:255',
            'divisa_empresa' => 'required|string|max:255',
        ]);





        return redirect()->route('admin.ajustes.index')->with('success', 'Ajustes guardados correctamente');
    }
    






    
}
