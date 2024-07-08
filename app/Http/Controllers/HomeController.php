<?php

namespace App\Http\Controllers;

use App\Models\Accesorio;
use App\Models\Accion;
use App\Models\Equipo;
use App\Models\Marca;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    //
    public function index(){
        return view('dashboard', [
            'users' => User::count(),
            'equipos' => Equipo::count(),
            'marcas' => Marca::count(),
            'accesorios' => Accesorio::count(),
            'acciones' => Accion::count(),
            'mantenimiento' =>  Equipo::where('estado','=','2')->count()
        ]);
    }
}
