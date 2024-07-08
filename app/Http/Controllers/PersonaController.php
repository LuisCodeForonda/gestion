<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PersonaController extends Controller
{
    //
    public function index()
    {
        return view('persona.index');
    }

    public function pdf(Request $request)
    {
        $personas = Persona::all();
        $user = Auth::user()->name;
        $pdf = Pdf::loadView('persona.pdf', compact('personas', 'user'));
        return $pdf->stream();
        return view('persona.pdf', compact('personas', 'user'));
    }
}
