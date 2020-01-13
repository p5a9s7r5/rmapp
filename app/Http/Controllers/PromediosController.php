<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promedio;

class PromediosController extends Controller
{

    public function fechaestatus ($fecha, $estatus) {

        $fecha1 = strtotime(date('Y-m-d', strtotime($fecha))); 
        $fecha2 = strtotime(date('Y-m-d', strtotime(now())));

        $cont = -1;

        for($fecha1;$fecha1<=$fecha2;$fecha1=strtotime('+1 day ' . date('Y-m-d',$fecha1))){ 

            if((strcmp(date('D',$fecha1),'Sun')!=0) AND (strcmp(date('D',$fecha1),'Sat')!=0)){

                $cont++; 
            }
        }

        $promedios = Promedio::orderBy('id', 'desc')->first();

        if($estatus == 'registrados'){

            $registrados = $promedios->registrados + 1;

            $promedio = (($promedios->prom_registrados * $promedios->registrados) + $cont) / $registrados;

            Promedio::where('id', $promedios->id)->update(['registrados' => $registrados , 'prom_registrados' => $promedio]);
        }

        if($estatus == 'enviados'){

            $enviados = $promedios->enviados + 1;

            $promedio = (($promedios->prom_enviados * $promedios->enviados) + $cont) / $enviados;

            Promedio::where('id', $promedios->id)->update(['enviados' => $enviados , 'prom_enviados' => $promedio]);
        }
    }
}
