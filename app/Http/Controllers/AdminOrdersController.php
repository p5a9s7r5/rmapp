<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ml_pedido;
use App\Articulo_Profit;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = Ml_pedido::busqueda($request->get('busqueda'))->estatus($request->get('estatus'))->orderBy('fecha', 'desc')->paginate();

        return view('admin.orders.index', compact('orders'));

        /*$orders=Ml_pedido::paginate(20);

        return view('admin.orders.index', compact('orders'));*/
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
        $order=Ml_pedido::findOrFail($id);

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
}
