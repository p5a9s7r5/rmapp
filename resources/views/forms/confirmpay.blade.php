@extends("layouts.plantillaforms")

@section("cabecera")

Confirmar Datos

@endsection


@section("general")


{!! Form::open(['method' => 'post', 'action' => 'FormsController@pay']) !!}

<table id="tabla2">

    <tr height="80">
       <th>{!!Form::label('seudonimo', 'Seudonimo')!!}</th>
       <td>{!!Form::text('seudonimo', session()->get('seudonimo'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('seudonimo', session()->get('seudonimo'))!!}
           {!!Form::hidden('pedidos_id', session()->get('pedidos_id'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('articulo_cliente', 'Articulo Comprado')!!}</th>
       <td>{!!Form::text('articulo_cliente', session()->get('articulo_cliente'), ['disabled' => 'disabled', 'class' => 'textarea3'])!!}</td>
           {!!Form::hidden('articulo_cliente', session()->get('articulo_cliente'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('otros_articulos', 'Articulos Adicionales')!!}</th>
       <td>{!!Form::textarea('otros_articulos', session()->get('otros_articulos'), ['disabled' => 'disabled', 'rows' => 3, 'cols' => 55])!!}</td>
           {!!Form::hidden('otros_articulos', session()->get('otros_articulos'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('cantidad_cliente', 'Total articulos')!!}</th>
       <td>{!!Form::number('cantidad_cliente', session()->get('cantidad_cliente'), ['disabled' => 'disabled', 'class' => 'textarea1'])!!}</td>
           {!!Form::hidden('cantidad_cliente', session()->get('cantidad_cliente'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('fecha_pago', 'Fecha Transferencia')!!}</th>
       <td>{!!Form::date('fecha_pago', session()->get('fecha_pago'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('fecha_pago', session()->get('fecha_pago'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('banco', 'Banco')!!}</th>
       <td>{!!Form::text('banco', session()->get('banco'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('banco', session()->get('banco'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('interbancario', 'Banco Origen')!!}</th>
       <td>{!!Form::text('interbancario', session()->get('interbancario'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('interbancario', session()->get('interbancario'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('monto_pago', 'Monto')!!}</th>
       <td>{!!Form::text('monto_pago', session()->get('monto_pago'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('monto_pago', number_format(session()->get('monto_pago'),2, ",", "."))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('referencia_pago', 'Numero Referencia')!!}</th>
       <td>{!!Form::text('referencia_pago', session()->get('referencia_pago'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('referencia_pago', session()->get('referencia_pago'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('otros_pagos', 'Transferencias Adicionales')!!}</th>
       <td>{!!Form::textarea('otros_pagos', session()->get('otros_pagos'), ['disabled' => 'disabled', 'rows' => 2, 'cols' => 55])!!}</td>
           {!!Form::hidden('otros_pagos', session()->get('otros_pagos'))!!}
    </tr>
    <tr height="80">
       <th>{!!Form::label('email', 'Email')!!}</th>
       <td>{!!Form::text('email', session()->get('email'), ['disabled' => 'disabled', 'class' => 'textarea3'])!!}</td>
           {!!Form::hidden('email', session()->get('email'))!!}
    </tr>
    <tr height="80">
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
