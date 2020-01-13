<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ml_pedido;
use App\Tasa;
use App\Promedio;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('accessVentas');
    }

    public function index()
    {

        $pagos = Ml_pedido::where('estatus', 'Pago Registrado')->orWhere('estatus', 'Envio Registrado')->count();

        $envios = Ml_pedido::where('estatus', 'Envio Aprobado')->count();

        $guias = Ml_pedido::where('estatus', 'Envio Procesado')->count();

        $tasa = Tasa::where('nombre', 'paridad')->first();

        $ofertas = Ml_pedido::whereDate('fecha', '>=',now()->subDays(7))->count();

        $prom_actual = Promedio::orderBy('id', 'desc')->first();

        $prom_anterior = Promedio::findOrFail($prom_actual->id - 1);

        $pedidos = Ml_pedido::whereDate('fecha', '>=',now()->subDays(31))->count();

        $calificaciones = Ml_pedido::whereDate('fecha', '>=',now()->subDays(31))->where('calificacion', 'negative')->orWhere('calificacion', 'neutral')->count();

        $prom_calificaciones = ($calificaciones / $pedidos) * 100;

        return view('admin.index', compact('pagos', 'envios', 'guias', 'tasa', 'ofertas', 'prom_actual', 'prom_anterior', 'calificaciones', 'prom_calificaciones'));
    }

    public function alert($id)
    {

        return view('admin.alert', compact('id'));
    }
}
