<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function index(){
        return view('rol.index', ['roles' => Role::orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rol.create', ['rol'=>new Role(), 'permisos' => Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required|string',
        ]);
        $rol = Role::create(['name' => $request->name]);
        $rol->syncPermissions($request->permisos);
        return redirect()->route('rol.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $rol)
    {
        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $rol)
    {
        $array1 = $rol->permissions;
        $permisos = Permission::all();
        for ($i=0; $i < $permisos->count(); $i++) { 
            for ($j=0; $j < $array1->count(); $j++) { 
                if($permisos[$i]->name == $array1[$j]->name){
                    $permisos[$i] = $array1[$j];
                    break;
                }
            }
        }
        return view('rol.edit', ['rol'=>$rol, 'permisos'=>$permisos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $rol)
    {
        request()->validate([
            'name'=>'required|string',
        ]);
        $rol->update(['name' => $request->name]);
        $rol->syncPermissions($request->permisos);
        return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $rol)
    {
        $rol->syncPermissions([]);
        $rol->delete();
        return redirect()->route('rol.index');
    }
}
