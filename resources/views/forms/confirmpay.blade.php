@extends("layouts.plantilla")

@section("cabecera")

Confirmar Datos

@endsection


@section("general")


{!! Form::open(['method' => 'post', 'action' => 'FormsController@pay']) !!}

<table id="tabla2">

    <tr height="50">
       <th>{!!Form::label('seudonimo', 'Seudonimo')!!}</th>
       <td>{!!Form::text('seudonimo', session()->get('seudonimo'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('seudonimo', session()->get('seudonimo'))!!}
           {!!Form::hidden('ml_pedido_pedidos_id', session()->get('ml_pedido_pedidos_id'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('articulo', 'Articulo Comprado')!!}</th>
       <td>{!!Form::text('articulo', session()->get('articulo'), ['disabled' => 'disabled', 'class' => 'textarea3'])!!}</td>
           {!!Form::hidden('articulo', session()->get('articulo'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrosart', 'Articulos Adicionales')!!}</th>
       <td>{!!Form::textarea('otrosart', session()->get('otrosart'), ['disabled' => 'disabled', 'rows' => 3, 'cols' => 55])!!}</td>
           {!!Form::hidden('otrosart', session()->get('otrosart'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('cantidad', 'Total articulos')!!}</th>
       <td>{!!Form::number('cantidad', session()->get('cantidad'), ['disabled' => 'disabled', 'class' => 'textarea1'])!!}</td>
           {!!Form::hidden('cantidad', session()->get('cantidad'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('fecha_pago', 'Fecha Transferencia')!!}</th>
       <td>{!!Form::date('fecha', session()->get('fecha'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('fecha', session()->get('fecha'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('banco', 'Banco')!!}</th>
       <td>{!!Form::text('banco', session()->get('banco'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('banco', session()->get('banco'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('interbancario', 'Banco Origen')!!}</th>
       <td>{!!Form::text('interbancario', session()->get('interbancario'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('interbancario', session()->get('interbancario'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('monto', 'Monto')!!}</th>
       <td>{!!Form::text('monto', session()->get('monto'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('monto', session()->get('monto'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('referencia', 'Numero Referencia')!!}</th>
       <td>{!!Form::text('referencia', session()->get('referencia'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('referencia', session()->get('referencia'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('otrastr', 'Transferencias Adicionales')!!}</th>
       <td>{!!Form::textarea('otrastr', session()->get('otrastr'), ['disabled' => 'disabled', 'rows' => 2, 'cols' => 55])!!}</td>
           {!!Form::hidden('otrastr', session()->get('otrastr'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('email', 'Email')!!}</th>
       <td>{!!Form::text('email', session()->get('email'), ['disabled' => 'disabled', 'class' => 'textarea3'])!!}</td>
           {!!Form::hidden('email', session()->get('email'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('despacho', 'Despacho')!!}</th>
       <td>{!!Form::text('despacho', session()->get('despacho'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('despacho', session()->get('despacho'))!!}
    </tr>    
</table>
<br/>
<div>

<table style="margin: 0 auto;">

<tr height="50">
    <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
   <td>{!!Form::submit('Confirmar')!!}</td>
</tr>

</table>

{!! Form::close() !!}

</div>
<br/><br/>

@endsection
