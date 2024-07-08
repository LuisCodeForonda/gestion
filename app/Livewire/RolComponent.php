<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolComponent extends Component
{
    #[Rule('required|string|min:3|unique:roles,name')]
    public $roleName;

    public $selectedPermissions = [];
    public $permisos;

    public $isOpen = false;
    public $paginate = 10;

    public function mount()
    {
        $this->permisos = Permission::all();
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
        $this->reset(['roleName', 'selectedPermissions']);
        $this->resetValidation();
    }

    public function store(){ 
    
        $this->validate();

        $rol = Role::create(['name' => $this->roleName]);
        $rol->syncPermissions($this->selectedPermissions);

        $this->closeModal();
    }

    public function edit(Role $rol){
        $array1 = $rol->permissions; 
        $permisos = Permission::all();
        for ($i=0; $i < $permisos->count(); $i++) { 
            for ($j=0; $j < $array1->count(); $j++) { 
                if($permisos[$i]->name == $array1[$j]->name){
                    $permisos[$i] = $array1[$j];
                    break;
                }
            }
        }
        $this->permisos = $permisos;
    }

    public function render()
    {
        return view('livewire.rol-component', ['roles' => Role::latest()->paginate($this->paginate)]);
    }
}
