<?php

namespace App\Http\Controllers;

use App\Models\Accion;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;

class AccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('accion.index', ['accions'=>Accion::orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accion.create', ['equipos'=>Equipo::all(), 'users'=>User::all(), 'accion'=>new Accion()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);
        Accion::create($request->all());
        return redirect()->route('accion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accion $accion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accion $accion)
    {
        return view('accion.edit', ['equipos'=>Equipo::all(),'users'=>User::all(), 'accion'=>$accion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accion $accion)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);
        $accion->update($request->all());
        return redirect()->route('accion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accion $accion)
    {
        $accion->delete();
        return redirect()->route('accion.index');
    }
}
