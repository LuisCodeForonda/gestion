<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('equipo.index', ['equipos'=>Equipo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipo.create', ['equipo'=>new Equipo(), 'marcas'=> Marca::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required',
            'serietec' => 'required|unique:equipos',
            'estado' => 'required',
        ]);
        Equipo::create($request->all());
        return redirect()->route('equipo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        return view('equipo.edit', ['equipo'=>$equipo, 'marcas'=>Marca::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        request()->validate([
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $equipo->update($request->all());
        return redirect()->route('equipo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipo.index');
    }
}
