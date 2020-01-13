<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'fecha', 'empleado', 'entrada', 'salida', 'dia', 'retraso', 'nombre', 'mes',
    ];
}
