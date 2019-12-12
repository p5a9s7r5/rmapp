<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo_Profit extends Model
{
    protected $table = 'ml_articulos_profit';

    protected $fillable = [
        'comprometido_temporal', 'titulo', 'nombre_ml', 'codigo_profit', 'ml3', 'ml4', 'ml5', 
        'variante_ml4', 'stock_reponer', 'fecha_rep',
    ];

    public function scopeBusqueda ($query, $busqueda)
    {

        if($busqueda != ""){

            $query->where(\DB::raw("CONCAT(titulo, codigo_profit, ml3, ml4)"), "LIKE", "%$busqueda%");

        }

    }

    public function scopeStock ($query, $stock)
    {

        if($stock == true){

            $query->where("stock_general", ">", 0);

        }

    }

}
