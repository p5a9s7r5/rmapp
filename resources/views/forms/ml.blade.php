@extends("layouts.plantillaforms")

@section("cabecera")

Formulario de Pagos

@endsection


@section("general")


{!! Form::open(['method' => 'post', 'action' => 'FormsController@confirmpay']) !!}

<table id="tabla2">

    <tr height="50">
       <th>{!!Form::label('seudonimo', 'Seudonimo')!!}</th>
       <td>{!!Form::text('seudonimo', $order->seudonimo, ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('seudonimo', $order->seudonimo)!!}
           {!!Form::hidden('pedidos_id', $order->pedidos_id)!!}
           {!!Form::hidden('ciudad_envio', $order->ubicacion)!!}
           {!!Form::hidden('telefono', $order->telefono)!!}
           {!!Form::hidden('destinatario', $order->nombre)!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('articulo', 'Articulo Comprado')!!}</th>
       <td>{!!Form::text('articulo_cliente', $order->titulo_publicacion . ' - ' . $order->variacion_nombre, ['required'=>'required', 'maxlength'=> 80, 'class' => 'textarea3'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrosa', 'Compras Articulos Adicionales? ')!!}</th>
       <td><input type="radio" name="hab1" onclick="otros_articulos.disabled=false" />Si 
           <input type="radio" name="hab1" onclick="otros_articulos.disabled=true" checked="checked"/>No</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otros_articulos', 'Articulos Adicionales')!!}</th>
       <td>{!!Form::textarea('otros_articulos', session()->get('otros_articulos'), ['disabled' => 'disabled', 'maxlength'=> 300, 'rows' => 4, 'cols' => 55])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('cantidad_cliente', 'Total articulos')!!}</th>
       <td>{!!Form::number('cantidad_cliente', $order->cantidad, ['required'=>'required', 'class' => 'textarea1'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('fecha_pago', 'Fecha Transferencia')!!}</th>
       <td>{!!Form::date('fecha_pago', session()->get('fecha_pago'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('banco', 'Banco')!!}</th>
       <td>{!!Form::select('banco', config('options.bancos'), session()->get('banco'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrobanco', 'La Trasnferencia se realizo desde otro Banco?')!!}</th>
       <td><input type="radio" name="hab2" onclick="interbancario.disabled=false" />Si 
           <input type="radio" name="hab2" onclick="interbancario.disabled=true" checked="checked"/>No
    </tr>
    <tr height="50">
       <th>{!!Form::label('interbancario', 'Banco Origen')!!}</th>
       <td>{!!Form::text('interbancario', session()->get('interbancario'), ['disabled' => 'disabled', 'maxlength'=> 20, 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('monto_pago', 'Monto')!!}</th>
       <td>{!!Form::text('monto_pago', $order->costo*$order->cantidad, ['required'=>'required', 'maxlength'=> 20, 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('referencia_pago', 'Numero Referencia')!!}</th>
       <td>{!!Form::text('referencia_pago', session()->get('referencia_pago'), ['required'=>'required', 'maxlength'=> 30, 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrast', 'Realizaste mas de una transferencia? ')!!}</th>
       <td><input type="radio" name="hab3" onclick="otros_pagos.disabled=false" />Si 
           <input type="radio" name="hab3" onclick="otros_pagos.disabled=true" checked="checked"/>No</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otros_pagos', 'Datos Transferencias Adicionales')!!}</th>
       <td>{!!Form::textarea('otros_pagos', session()->get('otros_pagos'), ['disabled' => 'disabled', 'maxlength'=> 300, 'rows' => 3, 'cols' => 55])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('email', 'Email')!!}</th>
       <td>{!!Form::email('email', session()->get('email'), ['required'=>'required', 'class' => 'textarea3'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('despacho', 'Despacho')!!}</th>
       <td>{!!Form::select('despacho', config('options.despachos'), session()->get('despacho'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>    
</table>
<br/>
<div>

<table style="margin: 0 auto;">

<tr height="50">
   <th>{!!Form::reset('Limpiar')!!}</th>
   <td>{!!Form::submit('Aceptar')!!}</td>
</tr>

</table>

{!! Form::close() !!}

</div>
<br/><br/>

@endsection
