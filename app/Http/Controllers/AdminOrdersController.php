<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ml_pedido;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Ml_pedido::All();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Ml_pedido::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
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
        $order = Ml_pedido::findOrFail($id);
        $order->pedido_profit = $request->pedido_profit;
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

        $orders=Ml_pedido::where('pedido_profit', '')->orderBy('fecha', 'asc')->take(1)->get();
        
        foreach($orders as $order){

            $id=$order->pedidos_id;

        }

        return redirect('/admin/orders/'.$id.'/edit');
              
    }
}
