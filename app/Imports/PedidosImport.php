<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Ml_pedido;

class PedidosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $rows = 0;

    public function model(array $row)
    {

        if($row[2] != ''){

            if (strpos($row[2], '*') !== false){

                $pedido = (int) substr($row[2], 0, -1);
                $estatus = "Anulado";

            }else{

                $pedido = (int) $row[2];
                $estatus = $row[7];
            }

            $orders = Ml_pedido::where('pedido_profit', $pedido)->first();

            if($orders){

                $order = Ml_pedido::findOrFail($orders->pedidos_id);

                if($order->estatus == "Pendiente" AND $estatus == "Anulado"){

                    $order->estatus = 'Cancelado';

                    ++$this->rows;
                }

                if($order->estatus == "Pendiente" AND $estatus == "Procesado"){

                    $order->estatus = 'Concretado';

                    ++$this->rows;
                }

                $order->save();
            }
        }
    }

    public function getRows()
    {
        return $this->rows;
    }
}
