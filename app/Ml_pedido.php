<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ml_pedido extends Model
{
    //protected $primaryKey = 'pedidos_id';

    protected $fillable = [
        'pedido_profit',
    ];
}
