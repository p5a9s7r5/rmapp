<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo_Profit;
use App\Tasa;

class AdminItemsController extends Controller
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

        $items = Articulo_Profit::busqueda($request->get('busqueda'))->stock($request->get('stock'))->orderBy('stock_general', 'desc')->paginate(50);

        $tasa = Tasa::where('nombre', 'paridad')->first();

        return view('admin.items.index', compact('items', 'tasa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $item = Articulo_Profit::findOrFail($id);
        
        $tasa= Tasa::where('nombre', 'paridad')->first();

        return view('admin.items.show', compact('item', 'tasa'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Articulo_Profit::findOrFail($id);

        return view('admin.items.edit', compact('item'));

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
        $item=Articulo_Profit::findOrFail($id);
        $item->update($request->all());

        return view('admin.items.show', compact('item'));
        
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

    public function replenish()
    {

        $items_all = Articulo_Profit::all();

        foreach($items_all as $item){

            if($item->tiempo_activo > 0){

                $stock_reponer = ($item->vendidos_ml / ($item->tiempo_activo / 40320)) - ($item->stock_disponible - $item->comprometido_temporal);
                $stock_reponer = ceil ($stock_reponer);

                if($stock_reponer != $item->stock_reponer){

                    Articulo_Profit::where('id', $item->id)->update(['stock_reponer' => $stock_reponer]);
                }
            }
        }

        $items = Articulo_Profit::where('stock_reponer', '>', 0)
                                ->whereDate('fecha_rep', '<',now()->subDays(60))
                                ->orderBy('stock_reponer', 'desc')->get();

        return view('admin.items.replenish', compact('items'));
    }

    public function buy(Request $request)
    {

        $ids = $request->input('id');
        $stocks = $request->input('stock_reponer');
        $titulos = $request->input('titulo');

        $i = 0;

        foreach($ids as $k => $id){

            if($stocks[$k] > 0){

                $items [$i] = array('id' => $ids[$k],
                                    'stock_reponer' => $stocks[$k],
                                    'titulo' => $titulos[$k] );
                          

                $i++;
            }
        }

        return view('admin.items.buy', compact('items'));
    }

    public function confirmbuy(Request $request)
    {

        $ids = $request->input('id');

        foreach($ids as $k => $id){

            Articulo_Profit::where('id', $ids[$k])->update(['fecha_rep' => now()]);

        }

        return redirect('/admin');
    }
}
