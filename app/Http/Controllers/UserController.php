<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){
        return view('usuario.index', ['usuarios'=>User::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('usuario.create', ['usuario'=>new User(), 'rolActual'=>'', 'roles'=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole($request->rol);

        return redirect()->route('usuario.index');
    }

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $rol = $usuario->getRoleNames()->first();
        return view('usuario.edit', ['usuario'=>$usuario, 'rolActual'=>$rol, 'roles'=>Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->syncRoles($request->rol);
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $marca)
    {
        return redirect()->route('marca.index');
    }

}
