<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'id_equipo', 'id_marca', 'modelo', 'serie', 'cantidad'];

    public function marca(){
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    public function equipo(){
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }
}
