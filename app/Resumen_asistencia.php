<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumen_asistencia extends Model
{
    protected $fillable = [
        'mes', 'nombre', 'inasistencias', 'retrasos_15min', 'retrasos_60min', 
    ];
}
