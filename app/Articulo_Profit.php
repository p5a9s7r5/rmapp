<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo_Profit extends Model
{
    protected $table = 'ml_articulos_profit';

    protected $fillable = [
        'comprometido_temporal',
    ];

}
