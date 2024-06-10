<?php

namespace App\Livewire;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
 
class MarcaComponent extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:30')]
    public $nombre;

    public $marca = null;
    public $marca_id = null;
    public $isOpen = false;
    public $paginate = 10;
    public $showDeleteModal = false;
    public $search = '';

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
        $this->reset('nombre', 'marca_id');
        $this->resetValidation();
    }

    public function openConfirmModal(){
        $this->showDeleteModal = true;
    }

    public function closeConfimModal(){
        $this->showDeleteModal = false;
        $this->reset('marca', 'nombre', 'marca_id');
    }

    public function store(){ 
    
        $this->validate();

        Marca::updateOrCreate(['id' => $this->marca_id], [
            'nombre' => $this->nombre,
        ]);

        session()->flash('message',
            $this->marca_id ? 'Marca Actualizada Exitosamente.' : 'Marca Creado Exitosamente.');

        $this->closeModal();
    }

    public function edit($id){
        $marca = Marca::findOrFail($id);
        $this->marca_id = $id;
        $this->nombre = $marca->nombre;
        
        $this->openModal();
    }

    public function destroy($id){
        $this->marca = Marca::findOrFail($id);
        $this->openConfirmModal();
    }

    public function confirmDestroy()
    {
        Marca::find($this->marca->id)->delete();
        session()->flash('message', 'Contacto Eliminado Exitosamente.');
        $this->closeConfimModal();
    }

    public function render()
    {
        if($this->search){
            $this->resetPage();
            return view('livewire.marca-component',  ['marcas' => Marca::where('nombre', 'LIKE', '%'.$this->search.'%')->paginate($this->paginate)]);
        }
        return view('livewire.marca-component',  ['marcas' => Marca::latest()->paginate($this->paginate)]);
    }
}
