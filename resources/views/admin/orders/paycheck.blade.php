@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.payments', 'Volver')}}
</div>

Verificar Pago

@endsection


@section("general")

@php
    $i=1;
@endphp

@foreach($orders as $order)

    @if($i==1)

        <table id="tabla1">
        <tr height="50">
            <h2>Cliente</h2>
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
            <th>Confirmar</th>
        </tr>

        {!! Form::model($pago, ['method' => 'PUT', 'action' => ['AdminOrdersController@updatepay', $pago->id]]) !!}

        <tr height="50">
            <td>{!!Form::date('fecha', $pago->fecha, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::select('banco', config('options.bancos'), $pago->banco, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::text('interbancario', $pago->interbancario, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::text('monto', $pago->monto, ['class' => 'textarea1'])!!}</td>
            <td>{!!Form::text('referencia', $pago->referencia, ['class' => 'textarea2'])!!}</td>
            <td>{!!Form::text('factura_profit', $order->factura_profit, ['class' => 'textarea2'])!!}</td>
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
            <td>{!!Form::label('despacho', $pago->despacho, ['class' => 'textarea3'])!!}</td>
            <td>{!!Form::label('articulo', $pago->articulo)!!}</td>
            <td>{!!Form::label('', $pago->otrosart)!!}</td>
            <td>{!!Form::label('cantidad', $pago->cantidad)!!}</td>
            <td>{!!Form::label('', $pago->otrastr)!!}</td>
        </tr>
        </table><br/><br/>

        @if($envio)

        <table id="tabla1">
        <tr height="50">
            <h2>Datos de Envio</h2>
            <th class='textarea2'>Nombre</th>
            <th class='textarea2'>Nro Cedula</th>
            <th class='textarea2'>Telefono</th>
            <th class='textarea3'>Direccion</th>
            <th class='textarea2'>Ciudad / Estado</th>
            <th class='textarea1'>Editar Datos</th>
        </tr>

        <tr height="50">
            <td>{!!Form::label('nombre', $envio->nombre)!!}</td>
            <td>{!!Form::label('cedula', $envio->cedula)!!}</td>
            <td>{!!Form::label('telefono', $envio->telefono)!!}</td>
            <td>{!!Form::label('direccion', $envio->direccion)!!}</td>
            <td>{!!Form::label('ciudad', $envio->ciudad)!!}</td>
            <td><input type ='button' class="btn btn-warning"  value = 'Editar' onclick="location.href = '{{ route('orders.shipedit', $envio->id) }}'"/></td>
        </tr>
        </table><br/><br/>

        @endif

        <table id="tabla1">
        <tr height="50">
            <h2>Datos de Oferta</h2>
            <th>Nro Oferta</th>
            <th>Articulo</th>
            <th>Codigo Profit</th>
            <th>Cantidad</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>Pedido Profit</th>
        </tr>

        <tr height="50">
            <td>{!!Form::label('codigo_venta', $order->codigo_venta)!!}</td>
            <td>{!!Form::label('titulo_publicacion', $order->titulo_publicacion)!!}</td>
            <td>{!!Form::label('codigo_profit', $order->codigo_profit)!!}</td>
            <td>{!!Form::label('cantidad', $order->cantidad)!!}</td>
            <td>{!!Form::label('costo', $order->costo)!!}</td>
            <td>{!!Form::label('fecha', $order->fecha)!!}</td>
            <td>{!!Form::label('estatus', $order->estatus)!!}</td>
            <td>{!!Form::label('pedido_profit',$order->pedido_profit, ['class' => 'textarea1'])!!}</td>
        </tr>

    @endif

    @if($i>1)

        <tr height="50">
            <td>{!!Form::label('codigo_venta', $order->codigo_venta)!!}</td>
            <td>{!!Form::label('titulo_publicacion', $order->titulo_publicacion)!!}</td>
            <td>{!!Form::label('codigo_profit', $order->codigo_profit)!!}</td>
            <td>{!!Form::label('cantidad', $order->cantidad)!!}</td>
            <td>{!!Form::label('costo', $order->costo)!!}</td>
            <td>{!!Form::label('fecha', $order->fecha)!!}</td>
            <td>{!!Form::label('estatus', $order->estatus)!!}</td>
            <td>{!!Form::label('pedido_profit',$order->pedido_profit, ['class' => 'textarea1'])!!}</td>
        </tr>

    @endif

    @php
        $i++;
    @endphp

    @endforeach

        </table>


@endsection

@section("pie")


@endsection