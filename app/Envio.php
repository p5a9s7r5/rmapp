<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $fillable = [
        'ml_pedido_pedidos_id', 'nombre', 'cedula', 'telefono',  'direccion', 'ciudad', 
    ];

    public function ml_pedido()
    {
        return $this->belongsTo('App\Ml_pedido');
    }
}
