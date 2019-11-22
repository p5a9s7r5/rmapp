<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ml_pedido;
use App\Pago;
use App\Envio;

class FormsController extends Controller
{

    public function mlpay($id)
    {

        $order = Ml_pedido::select('pedidos_id','seudonimo','titulo_publicacion','cantidad','costo','nombre','telefono','ubicacion','estatus')
                            ->where('codigo_venta', $id)->firstOrFail();

        if($order->estatus == 'Pago Registrado' or $order->estatus == 'Envio Registrado' or $order->estatus == 'Pago Verificado' or $order->estatus == 'Envio Aprobado' or $order->estatus == 'Envio Procesado' or $order->estatus == 'Enviado'){

            return view('forms.alert', compact('order'));

        }

        return view('forms.ml', compact('order'));

    }

    public function confirmpay(Request $request)
    {

        session($request->all());

        if($request->despacho != 'Retiro'){

            return view('forms.ml2');
        }
        
        return view('forms.confirmpay');

    }

    public function confirmship(Request $request)
    {

        session($request->all());

        return view('forms.confirmship');

    }

    public function pay(Request $request)
    {

        Pago::create($request->all());

        $request->session()->flush();

        Ml_pedido::where('pedidos_id', $request->ml_pedido_pedidos_id)->update(['estatus' => 'Pago Registrado', 'email' => $request->email]);

        return view('forms.confirm1');

    }

    public function ship(Request $request)
    {

        Pago::create($request->all());

        Envio::create($request->all());

        Ml_pedido::where('pedidos_id', $request->ml_pedido_pedidos_id)->update(['estatus' => 'Envio Registrado', 'email' => $request->email]);

        $request->session()->flush();

        return view('forms.confirm2');

    }

    public function prueba()
    {

        return view('forms.confirm2');

    }


}
