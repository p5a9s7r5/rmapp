<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasa;

class AdminTaxesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accessOper');
    }

    public function index()
    {
        $tasas = Tasa::All();

        return view('admin.taxes.index', compact('tasas'));
    }

    public function update(Request $request, $id)
    {
        $tasa = Tasa::findOrFail($id);
        $tasa->valor = $request->valor;
        $tasa->save();

        if($tasa->nombre == 'paridad'){

            return redirect('http://requiemmedia.co.ve/administrador_ml/cron/ml3g.php');

        }else{

            return redirect('/admin/taxes');
        }
    }
}
