<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Articulo_Profit;
use App\Ml_pedido;
use App\Mensaje;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Ml_pedido::busqueda($request->get('busqueda'))->estatus($request->get('estatus'))->orderBy('fecha', 'desc')->paginate(30);

        return view('admin.orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Ml_pedido::where('pedido_profit', '')->orderBy('fecha', 'desc')->get();

        return view('admin.orders.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Ml_pedido::findOrFail($id);

        return view('admin.orders.show', compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order_id=Ml_pedido::findOrFail($id);

        $seudonimo=$order_id['seudonimo'];
      
        $orders=Ml_pedido::where('seudonimo', $seudonimo)->orderBy('fecha', 'desc')->get();

        return view('admin.orders.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // En caso que el cliente sea Nuevo cambia a Pendiente, y actualizamos el stock comprometido temporal

        if($request->estatus == 'Nuevo'){

            $estatus = 'Pendiente';

            $articulo = Articulo_Profit::where('codigo_profit', $request->codigo_profit)->first();

            $articuloid = Articulo_Profit::findOrFail($articulo->id);
            $articuloid->comprometido_temporal = $articulo->comprometido_temporal - $request->cantidad;
            $articuloid->vendidos_ml = $articulo->vendidos_ml + $request->cantidad;
            $articuloid->save();

        }else{

            $estatus = $request->estatus;
        }

        if($request->pedido_profit = 0 or $request->pedido_profit == ''){

            $pedido_profit = 100;

        }else{

            $pedido_profit = $request->pedido_profit;
        }

        // Actualizamos el status del pedido

        $order = Ml_pedido::findOrFail($id);
        $order->pedido_profit = $pedido_profit;
        $order->estatus = $estatus;
        $order->save();

        return redirect('/admin/orders/aprofit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function aprofit()
    {
        
        $orders = Ml_pedido::where('pedido_profit', '0')->orderBy('fecha', 'asc')->first();

        if($orders){

            $id = $orders->pedidos_id;

            return redirect('/admin/orders/'.$id.'/edit');

        }else{

            Articulo_Profit::where('comprometido_temporal', '<>', 0)->update(['comprometido_temporal' => 0]);

            return ('No hay pedidos nuevos');

        }
    }

    public function payments()
    {

        $orders = Ml_pedido::where('estatus', 'Pago Registrado')->orWhere('estatus', 'Envio Registrado')->orderBy('fecha', 'asc')->get();

        return view('admin.orders.payments', compact('orders'));

    }

    public function paycheck($id)
    {
        $order = Ml_pedido::findOrFail($id);

        $orders = Ml_pedido::where('seudonimo', $order['seudonimo'])->orderBy('fecha', 'desc')->get();

        return view('admin.orders.paycheck', compact('order', 'orders'));
    }

    public function updatepay(Request $request, $id)
    {
        
        $order = Ml_pedido::findOrFail($id);
        $order->fecha_pago = $request->fecha_pago;
        $order->banco = $request->banco;
        $order->interbancario = $request->interbancario;
        $order->monto_pago = $request->monto_pago;
        $order->referencia_pago = $request->referencia_pago;
        $order->factura_profit = $request->factura_profit;
        if($order->estatus == 'Pago Registrado'){  
            $order->estatus = 'Pago Verificado'; 
        }elseif($order->estatus == 'Envio Registrado'){  
            $order->estatus = 'Envio Aprobado'; }
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        if($order->estatus == 'Pago Verificado'){
            if($mensaje->retiro != 1){
                $mensaje->retiro = 2;  
            } 
        }elseif($order->estatus == 'Envio Aprobado'){
            if($mensaje->pago != 1){
                $mensaje->pago = 2;
            } }
        $mensaje->save();

        return redirect('/admin/orders/payments');
    }

    public function shipedit($id)
    {
        $order = Ml_pedido::findOrFail($id);

        return view('admin.orders.shipedit', compact('order'));
    }

    public function updateship(Request $request, $id)
    {

        $order = Ml_pedido::findOrFail($id);
        $order->despacho = $request->despacho;
        $order->destinatario = $request->destinatario;
        $order->cedula = $request->cedula;
        $order->telefono = $request->telefono;
        $order->direccion_envio = $request->direccion_envio;
        $order->ciudad_envio = $request->ciudad_envio;
        $order->save();

        return redirect('/admin/orders/');
    }

    public function shipping()
    {

        $orders = Ml_pedido::where('estatus', 'Envio Aprobado')->orderBy('fecha', 'asc')->get();

        return view('admin.orders.shipping', compact('orders'));

    }

    public function pdfguide($id)
    {

        $order = Ml_pedido::findOrFail($id);

        $pdf = PDF::loadView('admin.orders.pdfguide', compact('order'));

        $order->estatus = 'Envio Procesado';
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        if($order->despacho == 'Motorizado'){
            if($mensaje->motorizado != 1){
                $mensaje->motorizado = 2;  
            }
        }else{
            if($mensaje->envio != 1){
                $mensaje->envio = 2;
            } }
        $mensaje->save();

        return $pdf->stream();
    }

    public function guides()
    {

        $orders = Ml_pedido::where('estatus', 'Envio Procesado')->orderBy('fecha', 'asc')->get();

        return view('admin.orders.guides', compact('orders'));

    }

    public function updateguide(Request $request, $id)
    {

        $order = Ml_pedido::findOrFail($id);
        $order->guia_envio = $request->guia_envio;
        $order->despacho = $request->despacho;
        $order->estatus = 'Enviado';
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        $mensaje->despachado = 2;
        $mensaje->save();

        return redirect('/admin/orders/guides');
    }
}
