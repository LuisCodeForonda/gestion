<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $fillable = ['id_equipo', 'id_user', 'descripcion', 'estado'];

    public function equipos(){
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    public function usuarios(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
