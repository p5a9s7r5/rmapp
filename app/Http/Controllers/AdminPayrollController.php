<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AsistenciasImport;
use App\Resumen_asistencia;
use App\Global_asistencia;
use App\Asistencia;

class AdminPayrollController extends Controller
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
    public function index()
    {

        $registros = Global_asistencia::orderBy('mes', 'desc')->get();

        return view('admin.payroll.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('accessAdmin');

        return view('admin.payroll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Asistencia::where('mes', $request->mes)->delete();
        Resumen_asistencia::where('mes', $request->mes)->delete();
        Global_asistencia::where('mes', $request->mes)->delete();

        $import = new AsistenciasImport;
        $import->setMes($request->mes);
        Excel::import($import, $request->file('file'));

        // Se recorre la tabla de asistencias calcular el resumen y almacenar en tabla resumen_asistencias

        $asistencias = Asistencia::where('fecha', 'LIKE', $request->mes . '%')->get();

        foreach($asistencias as $asistencia){

            $inasistencias = 0;
            $retrasos_15min = 0;
            $retrasos_60min = 0;

            if($asistencia->entrada == "00:00:00"){

                $inasistencias = 1;
            }

            if($asistencia->retraso > 15 AND $asistencia->retraso <= 60){

                $retrasos_15min = 1;
            }

            if($asistencia->retraso > 60){

                $retrasos_60min = 1;
            }

            $registro = Resumen_asistencia::where('nombre', $asistencia->nombre)
                                          ->where('mes', substr($asistencia->fecha, 0, -3))
                                          ->first();

            if(!isset($registro)){

                Resumen_asistencia::create(['mes' => substr($asistencia->fecha, 0, -3), 
                                            'nombre' => $asistencia->nombre, 
                                            'inasistencias' => $inasistencias,
                                            'retrasos_15min' => $retrasos_15min,
                                            'retrasos_60min' => $retrasos_60min,] );

            }else{

                $resumen = Resumen_asistencia::findOrFail($registro->id);
                $resumen->inasistencias = $registro->inasistencias + $inasistencias;
                $resumen->retrasos_15min = $registro->retrasos_15min + $retrasos_15min;
                $resumen->retrasos_60min = $registro->retrasos_60min + $retrasos_60min;
                $resumen->save();
            }

        }

        // Se recorre la tabla de resumen_asistencias calcular los globales por mes y almacenar en tabla globales_asistencias
        
        $carbon = \Carbon\Carbon::parse($request->mes . "-01", 'UTC')->locale('es');
        $nombre_mes = ucwords($carbon->isoFormat('MMMM YYYY'));

        $resumenes = Resumen_asistencia::where('mes', $request->mes)->get();

        $total_inasistencias = 0;
        $total_retrasos_15min = 0;
        $total_retrasos_60min = 0;

        foreach($resumenes as $resumen){

            $total_inasistencias = $total_inasistencias + $resumen->inasistencias;
            $total_retrasos_15min = $total_retrasos_15min + $resumen->retrasos_15min;
            $total_retrasos_60min = $total_retrasos_60min + $resumen->retrasos_60min;
        }

        $num_resumenes = Resumen_asistencia::where('mes', $request->mes)->count();

        if($num_resumenes > 0){

            Global_asistencia::create(['mes' => $request->mes, 
                                       'nombre' => $nombre_mes, 
                                       'inasistencias' => $total_inasistencias / $num_resumenes,
                                       'retrasos_15min' => $total_retrasos_15min / $num_resumenes,
                                       'retrasos_60min' => $total_retrasos_60min / $num_resumenes,] );
        }

        return redirect('/admin/users');
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

    public function summary($id)
    {

        $registros = Resumen_asistencia::where('mes', $id)->get();

        $mes = Global_asistencia::where('mes', $id)->first();

        return view('admin.payroll.summary', compact('registros', 'mes'));
    }

    public function detail($id, $mes)
    {

        $registros = Asistencia::where('nombre', $id)->where('fecha', 'LIKE', $mes . '%')->get();

        $mes = Global_asistencia::where('mes', $mes)->first();

        $nombre = $id;

        return view('admin.payroll.detail', compact('registros', 'mes', 'nombre'));
    }
}
