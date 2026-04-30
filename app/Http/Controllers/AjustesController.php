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
            'descripcion_empresa' => 'required|string|max:255',
            'direccion_empresa' => 'required|string|max:255',
            'telefono_empresa' => 'required|string|max:255',
            'correo_empresa' => 'required|string|max:255',
            'divisa_empresa' => 'required|string|max:255',
            'logo_empresa' => 'required|string|max:255',
            'web_empresa' => 'required|string|max:255',
            'interes' => 'required|decimal|max:100',
            'mora' => 'required|decimal|max:100',
        ]);





        return redirect()->route('admin.ajustes.index')->with('success', 'Ajustes guardados correctamente');
    }
    






    
}
