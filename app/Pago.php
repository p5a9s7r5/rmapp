<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'ml_pedido_pedidos_id', 'articulo', 'otrosart', 'cantidad',  'fecha', 'banco', 'interbancario', 'monto', 'referencia', 'otrastr',  'despacho', 
    ];

    public function ml_pedido()
    {
        return $this->belongsTo('App\Ml_pedido');
    }

}
