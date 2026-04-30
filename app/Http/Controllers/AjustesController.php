<?php

namespace App\Http\Controllers;

use App\Models\Ajustes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class AjustesController extends Controller
{


    public function index()
    {
        $ajustes = Ajustes::first();

        try {
            // Intentamos obtener las divisas de la API
            $jsonData = @file_get_contents('https://api.hilariweb.com/divisas');
            $divisas = json_decode($jsonData, true);
        } catch (\Exception $e) {
            $divisas = null;
        }

        // Si la API falla o devuelve null, usamos una lista predeterminada
        if (!$divisas) {
            $divisas = [
                ['symbol' => 'S/', 'name' => 'Soles (Perú)'],
                ['symbol' => '$', 'name' => 'Pesos (Chile)'],
                ['symbol' => 'USD', 'name' => 'Dólares (EE.UU.)'],
                ['symbol' => '€', 'name' => 'Euros (Europa)'],
            ];
        }

        return view('admin.ajustes.index', compact('divisas', 'ajustes'));
    }







    public function store(Request $request)
    {

        // dd($request->all());


        //validar los datos
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'descripcion_empresa' => 'nullable|string|max:255',
            'direccion_empresa' => 'required|string|max:255',
            // 'telefono_empresa' => 'required|string|max:255',
            'correo_empresa' => 'required|email|max:255',
            'divisa_empresa' => 'required|string|max:255',
            'logo_empresa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'web_empresa' => 'nullable|string|max:255',
            'interes' => 'nullable|numeric|min:0|max:100',
            'mora' => 'nullable|numeric|min:0|max:100',
        ]);

        //verificar si ya existe un registro
        $ajusteExistente = Ajustes::first();


        if ($ajusteExistente) {

            //actualizar los datos
            $ajusteExistente->nombre_empresa = $request->nombre_empresa;
            $ajusteExistente->descripcion_empresa = $request->descripcion_empresa;
            $ajusteExistente->direccion_empresa = $request->direccion_empresa;
            $ajusteExistente->telefono_empresa = $request->telefono_empresa;
            $ajusteExistente->correo_empresa = $request->correo_empresa;
            $ajusteExistente->divisa_empresa = $request->divisa_empresa;

            if ($request->hasFile('logo_empresa')) {
                if ($ajusteExistente->logo_empresa) {
                    Storage::disk('public')->delete($ajusteExistente->logo_empresa);
                }
                $logoPath = $request->file('logo_empresa')->store('logos', 'public');
                $ajusteExistente->logo_empresa = $logoPath;
            }

            $ajusteExistente->web_empresa = $request->web_empresa;
            $ajusteExistente->interes = $request->interes ?? 10;
            $ajusteExistente->mora = $request->mora ?? 2;
            $ajusteExistente->save();

            return redirect()->route('admin.ajustes.index')->with('mensaje', 'Ajustes guardados correctamente')->with('icono', 'success');
        } else {
            //no existe un registro 
            //guardar los datos
            $ajustes = new Ajustes();
            $ajustes->nombre_empresa = $request->nombre_empresa;
            $ajustes->descripcion_empresa = $request->descripcion_empresa;
            $ajustes->direccion_empresa = $request->direccion_empresa;
            $ajustes->telefono_empresa = $request->telefono_empresa;
            $ajustes->correo_empresa = $request->correo_empresa;
            $ajustes->divisa_empresa = $request->divisa_empresa;

            if ($request->hasFile('logo_empresa')) {
                $logoPath = $request->file('logo_empresa')->store('logos', 'public');
                $ajustes->logo_empresa = $logoPath;
            }

            $ajustes->web_empresa = $request->web_empresa;
            $ajustes->interes = $request->interes ?? 10;
            $ajustes->mora = $request->mora ?? 2;
            $ajustes->save();

            return redirect()->route('admin.ajustes.index')->with('mensaje', 'Ajustes guardados correctamente')->with('icono', 'success');
        }
    }
}
