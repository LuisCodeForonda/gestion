<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarcaController extends Controller
{
    public function __construct()
    {   
        $this->middleware('permission:dahsboard.marca.index', ['only' => ['index']]);
        $this->middleware('permission:dahsboard.marca.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:dahsboard.marca.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dahsboard.marca.destroy', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $marcas = Marca::where('nombre', 'LIKE', '%'.$request->search.'%')->paginate(10);
        }else{
            $marcas = Marca::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('marca.index', ['marcas'=>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marca.create', ['marca'=>new Marca()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre'=>'required',
        ]);
        Marca::create($request->all());
        return redirect()->route('marca.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        request()->validate([
            'nombre'=>'required',
        ]);
        $marca->update($request->all());
        return redirect()->route('marca.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marca.index');
    }

    public function pdf(Request $request)
    {
        $marcas = Marca::all();
        $user = Auth::user()->name;
        return view('marca.pdf', compact('marcas', 'user'));
    }
}
