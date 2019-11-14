<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\BanksImport;

class AdminBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $lines = Banco::filtroBancos($request->get('busqueda'), 
                                    $request->get('banco'), 
                                    $request->get('tipo'), 
                                    $request->get('fecha1'), 
                                    $request->get('fecha2'));

        return view('admin.banks.index', compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Banco::where('fecha', $request->fecha)->delete();;

        $import = new BanksImport;
        $import->setFecha($request->fecha);
        Excel::import($import, $request->file('file'));

        return ('Numero de ingresos: ' . $import->getRows()); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $line = Banco::findOrFail($id);

        return view('admin.banks.show', compact('line'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
