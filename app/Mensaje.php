<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes_enviados';

    protected $fillable = [
        'recordatorio', 'retiro', 'pago', 'motorizado', 'envio', 'despachado', 'factura', 'despacho', 'guia',
    ];
}
