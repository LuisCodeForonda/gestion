<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        if($request->has('search')){
            $accesorios = Accesorio::where('descripcion', 'LIKE', '%'.$request->search.'%')->orWhere('modelo', 'LIKE', '%'.$request->search.'%')->paginate(10);
        }else{
            $accesorios = Accesorio::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('accesorio.index', ['accesorios'=>$accesorios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug = null)
    {
        $equipos = Equipo::select(['id', 'descripcion'])->get();
        $marcas = Marca::select(['id', 'nombre'])->get();
        if($slug == null){
            return view('accesorio.create', ['equipos'=>$equipos, 'marcas'=>$marcas, 'accesorio'=>new Accesorio()]);
        }else{
            $equipo = Equipo::where('slug', '=', $slug)->first();
            return view('accesorio.create', ['equipos'=>$equipos, 'marcas'=>$marcas, 'accesorio'=>new Accesorio(['id_equipo'=>$equipo->id])]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required',
            'id_equipo' => 'required',
            'id_marca' => 'required',
            'cantidad' => 'required|integer',
        ]);
        Accesorio::create($request->all());
        if($request->slug == null){
            return redirect()->route('accesorio.index');
        }else{
            $equipo = Equipo::where('id', '=', $request->slug)->first();
            return redirect()->route('equipo.show', $equipo->slug);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Accesorio $accesorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accesorio $accesorio)
    {
        return view('accesorio.edit', ['equipos'=>Equipo::all(),'marcas'=>Marca::all(), 'accesorio'=>$accesorio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accesorio $accesorio)
    {
        request()->validate([
            'descripcion' => 'required',
            'id_equipo' => 'required',
        ]);
        $accesorio->update($request->all());
        return redirect()->route('accesorio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accesorio $accesorio)
    {
        $accesorio->delete();
        return redirect()->route('accesorio.index');
    }
}
