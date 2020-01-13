@extends("layouts.plantilla")

@section("cabecera")

@endsection


@section("general")

<h1>Pagos por Verificar</h1><br/><br/>

<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Registro</th>
       <th>Seudonimo</th>
       <th>Fecha Pago</th>
       <th>Banco</th>
       <th>Banco Origen</th>
       <th>Monto</th>
       <th>Referencia</th>
       <th>Pedido Profit</th>
       <th>Otros Pagos</th>
       <th>Factura</th>
       <th>Verificar</th>
       <th>Modificar</th>
    </tr>
    </thead>
 
    <tbody>
    @foreach($orders as $order)

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@updatepay', $order->pedidos_id]]) !!}

        <tr height="50">
            <td>{{date('d/m H:i', strtotime($order->fecha_estatus))}}</td>
            <td>{{$order->seudonimo}}</td>
            <td>{{Form::label('fecha_pago', date('d/m', strtotime($order->fecha_pago)))}}</td>
                {!!Form::hidden('fecha_pago', $order->fecha_pago)!!}
            <td>{{$order->banco}}</td>
                {!!Form::hidden('banco', $order->banco)!!}
            <td>{{$order->interbancario}}</td>
                {!!Form::hidden('interbancario', $order->interbancario)!!}
            <td>{{number_format($order->monto_pago,0, ",", ".")}}</td>
                {!!Form::hidden('monto_pago', $order->monto_pago)!!}
            <td>{{$order->referencia_pago}}</td>
                {!!Form::hidden('referencia_pago', $order->referencia_pago)!!}
            <td>{{$order->pedido_profit}}</td>
                {!!Form::hidden('pedido_profit', $order->pedido_profit)!!}
            @if($order->otros_pagos)
                <td>Si</td>
            @else
                <td>No</td>
            @endif
            <td>{!!Form::text('factura_profit', $order->factura_profit, ['class' => 'textarea1'])!!}</td>
            <td>{!!Form::submit('Aprobar')!!}</td>
            <td><input type ='button' class="btn btn-warning"  value = 'Datos' onclick="location.href = '{{ route('orders.paycheck', $order->pedidos_id) }}'"/></td>
        </tr>

        {!! Form::close() !!}

    @endforeach
    </tbody>
</table>
</div>

@endsection

@section("pie")


@endsection