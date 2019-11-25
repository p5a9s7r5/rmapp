<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ml_pedido extends Model
{
    protected $primaryKey = 'pedidos_id';

    protected $fillable = [
        'pedido_profit', 'estatus', 'email', 'articulo_cliente', 'otros_articulos', 'cantidad_cliente', 
        'fecha_pago', 'banco', 'interbancario', 'monto_pago', 'referencia_pago', 'otros_pagos', 'email', 
        'despacho', 'estatus', 'destinatario', 'cedula', 'telefono', 'direccion_envio', 'ciudad_envio',
        'guia_envio',
    ];

    public function scopeBusqueda ($query, $busqueda)
    {

        if($busqueda != ""){

            $query->where(\DB::raw("CONCAT(codigo_venta, seudonimo, nombre, titulo_publicacion, pedido_profit, telefono, ubicacion, destinatario, cedula)"), "LIKE", "%$busqueda%");

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
