<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promedio extends Model
{
    protected $fillable = [
        'prom_registrados', 'registrados', 'prom_enviados', 'enviados',
    ];
}
