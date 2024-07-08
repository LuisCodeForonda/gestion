<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $role = Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'dahsboard.index'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.usuario.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.usuario.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.usuario.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.usuario.pdf'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.rol.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.rol.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.rol.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.rol.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.marca.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.marca.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.marca.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.marca.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.marca.pdf'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.equipo.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.equipo.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.equipo.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.equipo.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.equipo.show'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.equipo.pdf'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.accesorio.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.accesorio.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.accesorio.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.accesorio.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.accion.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.accion.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.accion.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.accion.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'dahsboard.persona.index'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.persona.create'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.persona.edit'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.persona.destroy'])->syncRoles([$role]);
        Permission::create(['name' => 'dahsboard.persona.pdf'])->syncRoles([$role]);
        

        \App\Models\User::create([
            'name' => 'Luis Foronda',
            'email' => 'luis@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($role);

        \App\Models\Marca::create([
            'nombre' => 'Samsung',
        ]);
        \App\Models\Marca::create([
            'nombre' => 'Master G',
        ]);
        \App\Models\Marca::create([
            'nombre' => 'Sony',
        ]);
        \App\Models\Marca::create([
            'nombre' => 'Skyword',
        ]);

        \App\Models\Equipo::create([
            'descripcion' => 'Televisor 55" Full HD',
            'marca_id' => 1,
            'modelo' => 'tv552024uhd',
            'serietec' => 'TEC-MON-021',
            'slug' => 'tec-mod-021',
            'estado' => '1',
        ]);



    }
}
