<?php

namespace App\Http\Controllers;

use App\Models\Accion;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dahsboard.accion.index', ['only' => ['index']]);
        $this->middleware('permission:dahsboard.accion.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:dahsboard.accion.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dahsboard.accion.destroy', ['only' => ['destroy']]);
    }
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
        return view('accion.create', ['equipos'=>Equipo::all(), 'accion'=>new Accion()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required',
            'estado' => 'required',
            'id_equipo' => 'required',
        ]);
        Accion::create([
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'id_user' => Auth::getUser()->id,
            'id_equipo' => $request->id_equipo,
        ]);
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
        return view('accion.edit', ['equipos'=>Equipo::all(), 'accion'=>$accion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accion $accion)
    {
        request()->validate([
            'descripcion' => 'required',
            'estado' => 'required',
            'id_equipo' => 'required',
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
