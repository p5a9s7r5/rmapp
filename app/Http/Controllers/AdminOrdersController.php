<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Articulo_Profit;
use App\Ml_pedido;
use App\Mensaje;
use App\Envio;
use App\Pago;

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

        $pago = Ml_pedido::find($id)->pago;

        $envio = Ml_pedido::find($id)->envio;

        return view('admin.orders.show', compact('order', 'pago', 'envio'));

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

        // Actualizamos el status del pedido

        $order = Ml_pedido::findOrFail($id);
        $order->pedido_profit = $request->pedido_profit;
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
        $order_id = Ml_pedido::findOrFail($id);

        $orders = Ml_pedido::where('seudonimo', $order_id['seudonimo'])->orderBy('fecha', 'desc')->get();

        $pago = Ml_pedido::find($id)->pago;

        $envio = Ml_pedido::find($id)->envio;

        return view('admin.orders.paycheck', compact('orders', 'pago', 'envio'));
    }

    public function updatepay(Request $request, $id)
    {
        
        $pago = Pago::findOrFail($id);
        $pago->fecha = $request->fecha;
        $pago->banco = $request->banco;
        $pago->interbancario = $request->interbancario;
        $pago->monto = $request->monto;
        $pago->referencia = $request->referencia;
        $pago->save();

        $order = Pago::find($id)->ml_pedido;
        $order->factura_profit = $request->factura_profit;
        if($order->estatus == 'Pago Registrado'){  
            $order->estatus = 'Pago Verificado'; 
        }elseif($order->estatus == 'Envio Registrado'){  
            $order->estatus = 'Envio Aprobado'; }
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        $mensaje->factura = $request->factura_profit;
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
        $envio = Envio::findOrFail($id);

        $order = Envio::find($id)->ml_pedido;

        $pago = Ml_pedido::find($order->pedidos_id)->pago;

        return view('admin.orders.shipedit', compact('envio', 'order', 'pago'));
    }

    public function updateship(Request $request, $id)
    {
        
        $envio = Envio::findOrFail($id);
        $envio->nombre = $request->nombre;
        $envio->cedula = $request->cedula;
        $envio->telefono = $request->telefono;
        $envio->direccion = $request->direccion;
        $envio->ciudad = $request->ciudad;
        $envio->save();

        $pago = Ml_pedido::find($request->pedidos_id)->pago;
        $pago->despacho = $request->despacho;
        $pago->save();

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
        $pago = Ml_pedido::find($id)->pago;
        $envio = Ml_pedido::find($id)->envio;

        $pdf = PDF::loadView('admin.orders.pdfguide', compact('order', 'pago','envio'));

        $order->estatus = 'Envio Procesado';
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        $mensaje->despacho = $pago->despacho;
        if($pago->despacho == 'Motorizado'){
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

        foreach($orders as $order){

            $envios = Ml_pedido::find($order->pedidos_id)->envio;
        
        }
        //$envios = Ml_pedido::find($orders->pedidos_id)->envio;

        //dd($envios);

        return view('admin.orders.guides', compact('envios'));

    }
}
