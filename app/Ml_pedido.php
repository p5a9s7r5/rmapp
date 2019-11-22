<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ml_pedido extends Model
{
    protected $primaryKey = 'pedidos_id';

    protected $fillable = [
        'pedido_profit', 'estatus', 'email',
    ];

    public function scopeBusqueda ($query, $busqueda)
    {

        if($busqueda != ""){

            $query->where(\DB::raw("CONCAT(codigo_venta, seudonimo, nombre, titulo_publicacion, pedido_profit, telefono, ubicacion)"), "LIKE", "%$busqueda%");

        }

    }

    public function scopeEstatus ($query, $estatus)
    {

        if($estatus != ""){

            $query->where("estatus", $estatus);

        }

    }

    public function pago()
    {

        return $this->hasOne('App\Pago');
    }

    public function envio()
    {
        
        return $this->hasOne('App\Envio');
    }
}
