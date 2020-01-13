<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\PromediosController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PedidosImport;
use App\Articulo_Profit;
use App\Ml_pedido;
use App\Mensaje;

class AdminOrdersController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('accessVentas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Ml_pedido::busqueda($request->get('busqueda'))->estatus($request->get('estatus'))->orderBy('fecha', 'desc')->paginate(50);

        return view('admin.orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $import = new PedidosImport;
        Excel::import($import, $request->file('file'));

        return redirect('https://www.requiemmedia.co.ve/administrador_ml/cron/mensajes_recordatorio.php');
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
            $articuloid->save();

        }else{

            $estatus = $request->estatus;
        }

        if($request->estatus == 'Duplicado'){

            $pedido_profit = 100;

            $articulo = Articulo_Profit::where('codigo_profit', $request->codigo_profit)->first();

            $articuloid = Articulo_Profit::findOrFail($articulo->id);
            $articuloid->vendidos_ml = $articulo->vendidos_ml - $request->cantidad;
            $articuloid->save();

        }else{

            $pedido_profit = $request->pedido_profit;
        }

        if($request->estatus == 'Agotado' OR $request->estatus == 'Cancelado'){

            $pedido_profit = 100;
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

            return redirect('/admin/alert/2');

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
        $order->fecha_estatus = now();
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

        return redirect('/admin/orders/'.$id);
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
        $order->fecha_estatus = now();
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

            $fecha_estatus = new PromediosController();
            $fecha_estatus->fechaestatus($order->fecha_estatus, 'enviados');

        $order->fecha_estatus = now();
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        $mensaje->despachado = 2;
        $mensaje->save();

        return redirect('/admin/orders/guides');
    }

    public function contact()
    {

        $orders_all = Ml_pedido::where('estatus', 'Pendiente')->get();

        $costo_max = Ml_pedido::where('estatus', 'Pendiente')->max('costo');
        $costo_min = Ml_pedido::where('estatus', 'Pendiente')->min('costo');
        $fecha_max = strtotime(Ml_pedido::where('estatus', 'Pendiente')->max('fecha'));
        $fecha_min = strtotime(Ml_pedido::where('estatus', 'Pendiente')->min('fecha'));

        foreach($orders_all as $order){

            $prioridad = (int) (($order->costo - $costo_min) / (($costo_max - $costo_min) / 15)) + 
                         ((strtotime($order->fecha) - $fecha_min) / (($fecha_max - $fecha_min) / 10));

            $dif_min = (new \Carbon\Carbon($order->fecha_cont))->diffInMinutes(new \Carbon\Carbon(now()));

            if(($order->contacto == 'Contactado - Retiro' OR $order->contacto == 'Contactado - Envio' OR 
                $order->contacto == 'Concretada' OR $order->contacto == 'Sin Numero Registrado' OR 
                $order->contacto == 'Numero Incorrecto') AND $dif_min < 2160){ 

                $prioridad = 0;
            }

            if($order->contacto != ''){

                $prioridad = $prioridad - 5;

                if($order->contacto == 'No Contesta - 2do intento'){ $prioridad = $prioridad - 3; }

                if($order->contacto == 'No Contesta - 3er intento'){ $prioridad = $prioridad - 5; }

                if($dif_min < 240){ $prioridad = 0; }

                if($order->contacto == 'No Compra'){ $prioridad = 0; }
            }

            if($order->prioridad != $prioridad){

                Ml_pedido::where('pedidos_id', $order->pedidos_id)->update(['prioridad' => $prioridad]);
            }
        }

        $orders = Ml_pedido::where('estatus', 'Pendiente')
                            ->where('prioridad', '>', 0)
                            ->orderBy('prioridad', 'desc')->get();

        return view('admin.orders.contact', compact('orders'));

    }

    public function updatecontact(Request $request, $id)
    {

        $order = Ml_pedido::findOrFail($id);
        $order->contacto = $request->contacto;
        $order->fecha_cont = now();
        $order->save();

        $mensaje_id = Mensaje::where('order_id', $order->codigo_venta)->first();
        $mensaje = Mensaje::findOrFail($mensaje_id->id);
        if($request->contacto == 'No Contesta - 1er intento'){
            if($mensaje->no_contesta != 1){
                $mensaje->no_contesta = 2;  
            }}
        if($request->contacto == 'Sin Numero Registrado' OR $request->contacto == 'Numero Incorrecto'){
            if($mensaje->numero_incorrecto != 1){
                $mensaje->numero_incorrecto = 2;
            } }
        $mensaje->save();

        return redirect('/admin/orders/contact');
    }

    public function phoneedit($id)
    {
        $order = Ml_pedido::findOrFail($id);

        return view('admin.orders.phoneedit', compact('order'));
    }

    public function updatephone(Request $request, $id)
    {

        $order = Ml_pedido::findOrFail($id);
        $order->telefono = $request->telefono;
        $order->contacto = '';
        $order->save();

        return redirect('/admin/orders/'.$id);
    }
}
