<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ml_pedido;
use App\Mensaje;

class FormsController extends Controller
{

    public function mlpay($id)
    {

        $order = Ml_pedido::select('pedidos_id','seudonimo','titulo_publicacion','cantidad','costo','nombre','telefono','ubicacion','estatus','variacion_nombre')
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

        $order = Ml_pedido::findOrFail($request->pedidos_id);
        $order->articulo_cliente = $request->articulo_cliente;
        $order->otros_articulos = $request->otros_articulos;
        $order->cantidad_cliente = $request->cantidad_cliente;
        $order->fecha_pago = $request->fecha_pago;
        $order->banco = $request->banco;
        $order->interbancario = $request->interbancario;
        $order->monto_pago = $request->monto_pago;
        $order->referencia_pago = $request->referencia_pago;
        $order->otros_pagos = $request->otros_pagos;
        $order->email = $request->email;
        $order->despacho = $request->despacho;
        $order->estatus = 'Pago Registrado';
        $order->save();

        $request->session()->flush();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        $mensaje->registrado = 2;
        $mensaje->save();
        
        return view('forms.confirm1');

    }

    public function ship(Request $request)
    {

        $order = Ml_pedido::findOrFail($request->pedidos_id);
        $order->articulo_cliente = $request->articulo_cliente;
        $order->otros_articulos = $request->otros_articulos;
        $order->cantidad_cliente = $request->cantidad_cliente;
        $order->fecha_pago = $request->fecha_pago;
        $order->banco = $request->banco;
        $order->interbancario = $request->interbancario;
        $order->monto_pago = $request->monto_pago;
        $order->referencia_pago = $request->referencia_pago;
        $order->otros_pagos = $request->otros_pagos;
        $order->email = $request->email;
        $order->despacho = $request->despacho;
        $order->destinatario = $request->destinatario;
        $order->cedula = $request->cedula;
        $order->direccion_envio = $request->direccion_envio;
        $order->ciudad_envio = $request->ciudad_envio;
        $order->estatus = 'Envio Registrado';
        $order->save();

        $request->session()->flush();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        $mensaje->registrado = 2;
        $mensaje->save();

        return view('forms.confirm2');

    }

    public function prueba()
    {

        return view('forms.confirm2');

    }
}
