<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Accion;
use App\Models\Equipo;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $accesorios = Accesorio::where('equipo_id', '=', $equipo->id)->orderBy('created_at', 'desc')->get();
        $acciones = Accion::where('equipo_id', '=', $equipo->id)->orderBy('created_at', 'desc')->get();
        $qrcode = QrCode::size(256)->generate('https://admin.ctvbolivia.com/dashboard/equipo/'.$equipo->slug);
        return view('equipo.show', compact('equipo', 'accesorios', 'acciones', 'qrcode'));
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
    
    public function pdf(Request $request, $slug = null)
    {
        if($slug){
            $equipo = Equipo::where('slug', '=', $slug)->first();
            $accesorios = Accesorio::where('id_equipo', '=', $equipo->id)->orderBy('created_at', 'desc')->get();
            $acciones = Accion::where('id_equipo', '=', $equipo->id)->orderBy('created_at', 'desc')->get();
            $user = Auth::user()->name;
            $qrcode = QrCode::size(256)->generate('https://admin.ctvbolivia.com/dashboard/equipo/'.$equipo->slug);
            //$pdf = Pdf::loadView('equipo.showpdf', compact('equipo', 'accesorios', 'acciones', 'user', 'qrcode'));
            //$pdf = Pdf::loadHTML('<img src="data:image/png;base64,' . base64_encode($qrcode) . '">');
            $pdf = Pdf::loadHTML(view('equipo.showpdf', compact('equipo', 'accesorios', 'acciones', 'user', 'qrcode')));
            return $pdf->stream();
        }else{
            $equipos = Equipo::all();
            $user = Auth::user()->name;
            $pdf = Pdf::loadView('equipo.pdf', compact('equipos', 'user'));
            return $pdf->stream();
            return view('equipo.pdf', compact('equipos', 'user'));
        }
       
    }
    
}
