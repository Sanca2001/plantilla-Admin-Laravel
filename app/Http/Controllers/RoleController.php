<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
            'guard_name' => 'required|string|max:255',
        ]);

        // 2. 
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        // 3. Redirigir con un mensaje de éxito
        return redirect()->route('admin.roles.index')->with('mensaje', 'Rol creado correctamente')->with('icono', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'guard_name' => 'required|max:255',
        ]);

        $role = Role::findById($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        return redirect()->route('admin.roles.index')->with('mensaje', 'Rol actualizado correctamente')->with('icono', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // echo $id;

        $role = Role::find($id);
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol eliminado correctamente')
            ->with('icono', 'success');
    }
}
