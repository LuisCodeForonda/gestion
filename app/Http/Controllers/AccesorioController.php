<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    public function __construct()
    {   
        $this->middleware('permission:dahsboard.accesorio.index', ['only' => ['index']]);
        $this->middleware('permission:dahsboard.accesorio.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:dahsboard.accesorio.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dahsboard.accesorio.destroy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        return view('accesorio.index', ['accesorios'=>Accesorio::orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accesorio.create', ['equipos'=>Equipo::all(), 'marcas'=>Marca::all(), 'accesorio'=>new Accesorio()]);
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
        return redirect()->route('accesorio.index');
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
