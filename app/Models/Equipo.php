<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'id_marca', 'modelo', 'serie', 'serietec', 'estado'];

}
