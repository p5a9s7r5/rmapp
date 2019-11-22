@extends("layouts.plantilla")

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
           {!!Form::hidden('ml_pedido_pedidos_id', $order->pedidos_id)!!}
           {!!Form::hidden('ciudad', $order->ubicacion)!!}
           {!!Form::hidden('telefono', $order->telefono)!!}
           {!!Form::hidden('nombre', $order->nombre)!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('articulo', 'Articulo Comprado')!!}</th>
       <td>{!!Form::text('articulo', $order->titulo_publicacion, ['required'=>'required','class' => 'textarea3'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrosa', 'Compras Articulos Adicionales? ')!!}</th>
       <td><input type="radio" name="hab1" onclick="otrosart.disabled=false" />Si 
           <input type="radio" name="hab1" onclick="otrosart.disabled=true" checked="checked"/>No</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrosart', 'Articulos Adicionales')!!}</th>
       <td>{!!Form::textarea('otrosart', session()->get('otrosart'), ['disabled' => 'disabled', 'rows' => 4, 'cols' => 55])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('cantidad', 'Total articulos')!!}</th>
       <td>{!!Form::number('cantidad', $order->cantidad, ['required'=>'required', 'class' => 'textarea1'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('fecha_pago', 'Fecha Transferencia')!!}</th>
       <td>{!!Form::date('fecha', session()->get('fecha'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
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
       <td>{!!Form::text('interbancario', session()->get('interbancario'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('monto', 'Monto')!!}</th>
       <td>{!!Form::text('monto', $order->costo, ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('referencia', 'Numero Referencia')!!}</th>
       <td>{!!Form::text('referencia', session()->get('referencia'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrast', 'Realizaste mas de una transferencia? ')!!}</th>
       <td><input type="radio" name="hab3" onclick="otrastr.disabled=false" />Si 
           <input type="radio" name="hab3" onclick="otrastr.disabled=true" checked="checked"/>No</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrastr', 'Datos Transferencias Adicionales')!!}</th>
       <td>{!!Form::textarea('otrastr', session()->get('otrastr'), ['disabled' => 'disabled', 'rows' => 3, 'cols' => 55])!!}</td>
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
