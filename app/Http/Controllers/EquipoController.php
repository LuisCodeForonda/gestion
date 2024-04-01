<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Accion;
use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('equipo.index', ['equipos'=>Equipo::orderBy('created_at', 'desc')->paginate(10)]);
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
        Equipo::create([
            'descripcion' => $request->descripcion,
            'id_marca' => $request->id_marca,
            'modelo' => $request->modelo,
            'serie' => $request->serie,
            'serietec' => $request->serietec,
            'estado' => $request->estado,
            'slug' => Str::slug($request->serietec),
        ]);
        return redirect()->route('equipo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $equipo = Equipo::where('slug', '=', $slug)->first();
        $accesorios = Accesorio::where('id_equipo', '=', $equipo->id)->get();
        $acciones = Accion::where('id_equipo', '=', $equipo->id)->get();
        return view('equipo.show', compact('equipo', 'accesorios', 'acciones'));
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
            'serietec' => 'required|unique:equipos',
            'estado' => 'required',
        ]);
        Equipo::create([
            'descripcion' => $request->descripcion,
            'id_marca' => $request->id_marca,
            'modelo' => $request->modelo,
            'serie' => $request->serie,
            'serietec' => $request->serietec,
            'estado' => $request->estado,
        ]);
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
