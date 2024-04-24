<?php

namespace App\Http\Controllers;

use App\Models\Accion;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create($slug = null)
    {
        if($slug == null){
            return view('accion.create', ['equipos'=>Equipo::all(), 'accion'=>new Accion(), 'slug'=>'']);
        }else{
            $equipo = Equipo::where('slug', '=', $slug)->first();
            return view('accion.create', ['equipos'=>Equipo::all(), 'accion'=>new Accion(['id_equipo'=>$equipo->id]), 'slug'=>$slug]);
        }
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
        if($request->slug == null){
            return redirect()->route('accion.index');
        }else{
            return redirect()->route('equipo.show', $request->slug);
        }
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
    public function edit(Accion $accion, $slug = null)
    {
        return view('accion.edit', ['equipos'=>Equipo::all(), 'accion'=>$accion, 'slug'=>$slug]);
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
        if($request->slug == null){
            return redirect()->route('accion.index');
        }else{
            return redirect()->route('equipo.show', $request->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Accion $accion)
    {
        $accion->delete();
        if($request->slug == null){
            return redirect()->route('accion.index');
        }else{
            return redirect()->route('equipo.show', $request->slug);
        }
    }
}
