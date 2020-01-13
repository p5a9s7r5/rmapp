<?php

namespace App\Imports;

use App\Banco;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BanksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $fecha;
    private $rows = 0;

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    
    public function model(array $row)
    {

        if($row['fecha'] != ''){

            if($row['banco'] == 'Banesco'){ 
            
                $monto = $row['monto'];

                if($row['tipo'] == '-'){

                    $tipo = 'Salida';

                }else{

                    $tipo = 'Entrada';
                }

            }elseif($row['banco'] == 'Mercantil'){
            
                if($row['monto1'] != ''){

                    $tipo = 'Salida';
                    $monto = $row['monto1'];

                }else{

                    $tipo = 'Entrada';
                    $monto = $row['monto2'];
                }

                $monto = str_replace('.', '', $monto);
                $monto = floatval(str_replace(',', '.', $monto));

            }elseif($row['banco'] == 'Venezuela'){

                if($row['monto1'] != ''){

                    $tipo = 'Salida';
                    $monto = $row['monto1'];

                }else{

                    $tipo = 'Entrada';
                    $monto = $row['monto2'];
                }
            }

            ++$this->rows;
        
            return new Banco([
                'banco'       => $row['banco'],
                'fecha'       => $this->fecha, 
                'referencia'  => $row['referencia'],
                'monto'       => $monto,
                'tipo'        => $tipo,
                'descripcion' => $row['descripcion'],
            ]);
        }
    }

    public function getRows()
    {
        return $this->rows;
    }
}
