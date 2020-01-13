<?php

namespace App\Imports;

use App\Asistencia;
use Maatwebsite\Excel\Concerns\ToModel;

class AsistenciasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $mes;

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function model(array $row)
    {

        if(strpos($row[3], $this->mes) !== false AND ($row[4] == "Lun." OR $row[4] == "Mar." OR $row[4] == "Mie." OR $row[4] == "Jue." OR $row[4] == "Vie.")){

            if($row[5] != ""){

                if(strlen($row[5]) == 11){

                    $hora = substr($row[5], 0, -6) . ":00";

                }else{

                    $hora = $row[5] . ":00";

                }

                if($hora > "09:00:00"){

                    $retraso = (new \Carbon\Carbon("09:00:00"))->diffInMinutes(new \Carbon\Carbon($hora));

                }else{

                    $retraso = 0;
                }

            }else{

                $hora = "";

                $retraso = 0;
            }

            $nombre = strtolower($row[2]);
            $nombre = ucwords($nombre);

            return new Asistencia([
                'fecha'     => $row[3],
                'empleado'  => $row[1], 
                'nombre'    => $nombre,
                'entrada'   => $hora,
                'salida'    => $row[6],
                'dia'       => $row[4],
                'retraso'   => $retraso,
                'mes'       => $this->mes,
            ]);
        }
    }
}
