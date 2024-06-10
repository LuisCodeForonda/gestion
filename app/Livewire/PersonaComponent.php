<?php

namespace App\Livewire;

use App\Models\Persona;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PersonaComponent extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $nombre;

    #[Rule('max:15')]
    public $carnet;

    #[Rule('required|min:3|max:50')]
    public $cargo;
    
    public $persona = null;
    public $persona_id = null;
    public $isOpen = false;
    public $paginate = 10;
    public $showDeleteModal = false;
    public $search = '';

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
        $this->reset('nombre', 'carnet', 'cargo');
        $this->resetValidation();
    }

    public function openConfirmModal(){
        $this->showDeleteModal = true;
    }

    public function closeConfimModal(){
        $this->showDeleteModal = false;
        $this->reset('persona', 'nombre', 'carnet', 'cargo');
    }

    public function store(){ 
    
        $this->validate();

        Persona::updateOrCreate(['id' => $this->persona_id], [
            'nombre' => $this->nombre,
            'carnet' => $this->carnet,
            'cargo' => $this->cargo,
        ]);

        session()->flash('message',
            $this->persona_id ? 'Persona Actualizada Exitosamente.' : 'Persona Creado Exitosamente.');

        $this->closeModal();
    }

    public function edit($id){
        $persona = Persona::findOrFail($id);
        $this->persona_id = $id;
        $this->nombre = $persona->nombre;
        $this->carnet = $persona->carnet;
        $this->cargo = $persona->cargo;

        $this->openModal();
    }

    public function destroy($id){
        $this->persona = Persona::findOrFail($id);
        $this->openConfirmModal();
    }

    public function confirmDestroy()
    {
        Persona::find($this->persona->id)->delete();
        session()->flash('message', 'Persona Eliminado Exitosamente.');
        $this->closeConfimModal();
    }

    public function render()
    {
        if($this->search){
            $this->resetPage();
            return view('livewire.persona-component',  ['personas' => Persona::where('nombre', 'LIKE', '%'.$this->search.'%')->paginate($this->paginate)]);
        }
        return view('livewire.persona-component', ['personas' => Persona::latest()->paginate($this->paginate)]);
    }
}
