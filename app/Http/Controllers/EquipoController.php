<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Accion;
use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dahsboard.equipo.index', ['only' => ['index']]);
        $this->middleware('permission:dahsboard.equipo.show', ['only' => ['show']]);
        $this->middleware('permission:dahsboard.equipo.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:dahsboard.equipo.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dahsboard.equipo.destroy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $equipos = Equipo::where('descripcion', 'LIKE', '%'.$request->search.'%')->paginate(10);
        }else{
            $equipos = Equipo::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('equipo.index', ['equipos'=>$equipos]);
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
        $acciones = Accion::where('id_equipo', '=', $equipo->id)->orderBy('created_at', 'desc')->get();
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
            'estado' => 'required',
        ]);
        $equipo->update([
            'descripcion' => $request->descripcion,
            'id_marca' => $request->id_marca,
            'modelo' => $request->modelo,
            'serie' => $request->serie,
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

    public function addAccesorio(Equipo $equipo){
        $accesorio = new Accesorio(['id_equipo' => $equipo->id]);
        $equipos = Equipo::select(['id', 'descripcion', 'slug'])->get();
        $marcas = Marca::select(['id', 'nombre'])->get();
        return view('equipo.add_accesorio', ['equipo'=>$equipo, 'accesorio'=>$accesorio, 'equipos'=>$equipos, 'marcas'=>$marcas]);
    }
    

    public function storeAccesorio(Request $request, Equipo $equipo)
    {
        request()->validate([
            'descripcion' => 'required',
            'id_equipo' => 'required',
            'id_marca' => 'required',
            'cantidad' => 'required|integer',
        ]);
        Accesorio::create($request->all());
        return redirect()->route('equipo.show', $equipo->slug);
    }

    public function addAccion(Equipo $equipo){
        $equipos = Equipo::select(['id', 'descripcion', 'slug'])->get();
        $accion = new Accion(['id_equipo'=>$equipo->id]);
        return view('equipo.add-accion', ['equipo'=>$equipo, 'accion'=>$accion, 'equipos'=>$equipos]);
    }

    public function storeAccion(Request $request, Equipo $equipo){
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

        return redirect()->route('equipo.show', $equipo->slug);
    }
    
}
