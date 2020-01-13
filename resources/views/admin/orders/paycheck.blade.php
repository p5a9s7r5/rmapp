@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Verificar Pago</h1><br/><br/>

    <table id="tabla1">
        <tr height="50">
            <th>Seudonimo:</th>
            <td>{{$order->seudonimo}}</td>
            <th>Nombre:</th>
            <td>{{$order->nombre}}</td>
            <th>Codigo Oferta:</th>
            <td>{{$order->codigo_venta}}</td>
        </tr>
    </table><br/><br/>

    <table id="tabla1">
        <tr height="50">
            <h2>Datos de Pago</h2>
            <th>Fecha</th>
            <th>Banco</th>
            <th>Banco Origen</th>
            <th>Monto</th>
            <th>Referencia</th>
            <th>Factura Profit</th>
        </tr>

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@updatepay', $order->pedidos_id]]) !!}

        <tr height="50">
            <td>{!!Form::date('fecha_pago', $order->fecha_pago, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::select('banco', config('options.bancos'), $order->banco, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::text('interbancario', $order->interbancario, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::text('monto_pago', $order->monto_pago, ['class' => 'textarea1'])!!}</td>
            <td>{!!Form::text('referencia_pago', $order->referencia_pago, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::text('factura_profit', $order->factura_profit, ['class' => 'textarea2'])!!}</td>
            
        </tr>
    </table><br/>

    <table style="margin: 0 auto;">
        <tr height="65">
            <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
            <td>{!!Form::submit('Aprobar')!!}</td>
        </tr>
    </table><br/><br/>

        {!! Form::close() !!}

    <table id="tabla1">
        <tr height="50">
            <h2>Datos Agregados</h2>
            <th class='textarea2'>Despacho</th>
            <th class='textarea2'>Articulo</th>
            <th class='textarea2'>Otros Articulos</th>
            <th class='textarea1'>Cantidad</th>
            <th class='textarea2'>Transferencias Adicionales</th>
        </tr>

        <tr height="50">
            <td>{!!Form::label('despacho', $order->despacho, ['class' => 'textarea3'])!!}</td>
            <td>{!!Form::label('articulo_cliente', $order->articulo_cliente)!!}</td>
            <td>{!!Form::label('', $order->otros_articulos)!!}</td>
            <td>{!!Form::label('cantidad_cliente', $order->cantidad_cliente)!!}</td>
            <td>{!!Form::label('', $order->otros_pagos)!!}</td>
        </tr>
    </table><br/><br/>

        @if($order->destinatario)

        <table id="tabla1">
        <tr height="50">
            <h2>Datos de Envio</h2>
            <th class='textarea2'>Destinatario</th>
            <th class='textarea2'>Nro Cedula</th>
            <th class='textarea2'>Telefono</th>
            <th class='textarea3'>Direccion</th>
            <th class='textarea2'>Ciudad / Estado</th>
            <th class='textarea1'>Editar Datos</th>
        </tr>

        <tr height="50">
            <td>{!!Form::label('destinatario', $order->destinatario)!!}</td>
            <td>{!!Form::label('cedula', $order->cedula)!!}</td>
            <td>{!!Form::label('telefono', $order->telefono)!!}</td>
            <td>{!!Form::label('direccion_envio', $order->direccion_envio)!!}</td>
            <td>{!!Form::label('ciudad_envio', $order->ciudad_envio)!!}</td>
            <td><input type ='button' class="btn btn-warning"  value = 'Editar' onclick="location.href = '{{ route('orders.shipedit', $order->pedidos_id) }}'"/></td>
        </tr>
        </table><br/>

        @endif

        <h2>Datos de Oferta</h2>

    <table id="tabla1">
        <tr height="50">

            <th>Nro Oferta</th>
            <th>Articulo</th>
            <th>Codigo Profit</th>
            <th>Cantidad</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>Pedido Profit</th>
        </tr>

        @foreach($orders as $ord)

        <tr height="50">
            <td>{!!Form::label('codigo_venta', $ord->codigo_venta)!!}</td>
            <td>{!!Form::label('titulo_publicacion', $ord->titulo_publicacion)!!}</td>
            <td>{!!Form::label('codigo_profit', $ord->codigo_profit)!!}</td>
            <td>{!!Form::label('cantidad', $ord->cantidad)!!}</td>
            <td>{!!Form::label('costo', $ord->costo)!!}</td>
            <td>{!!Form::label('fecha', date('d/m/y H:i', strtotime($ord->fecha)))!!}</td>
            <td>{!!Form::label('estatus', $ord->estatus)!!}</td>
            <td>{!!Form::label('pedido_profit',$ord->pedido_profit, ['class' => 'textarea1'])!!}</td>
        </tr>

        @endforeach

    </table><br/><br/>


@endsection

@section("pie")


@endsection