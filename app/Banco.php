<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    
    protected $fillable = [
        'banco', 'fecha', 'referencia', 'monto',  'tipo', 'descripcion', 
    ];

    public static function filtroBancos ($busqueda, $banco, $tipo, $fecha1, $fecha2)
    {

        return Banco::busqueda($busqueda)
                    ->banco($banco)
                    ->tipo($tipo)
                    ->fechas($fecha1, $fecha2)
                    ->orderBy('id', 'desc')
                    ->paginate(50);

    }

    public function scopeBusqueda ($query, $busqueda)
    {

        if($busqueda != ""){

            $query->where(\DB::raw("CONCAT(referencia, descripcion, monto)"), "LIKE", "%$busqueda%");

        }

    }

    public function scopeBanco ($query, $banco)
    {

        if($banco != ""){

            $query->where("banco", $banco);

        }

    }

    public function scopeTipo ($query, $tipo)
    {

        if($tipo != ""){

            $query->where("tipo", $tipo);

        }

    }

    public function scopeFechas ($query, $fecha1, $fecha2)
    {

        if($fecha1 != ""){

            $query->whereBetween('fecha', [$fecha1, $fecha2]);

        }

    }
}
