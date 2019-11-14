@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Ver Pedidos')}}
</div>

Cargar Pedidos Profit

@endsection


@section("general")

<table border="1">
    <tr height="50">
       <th>Nro Oferta</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Codigo Profit</th>
       <th>Cantidad</th>
       <th>Monto</th>
       <th>Fecha</th>
       <th>Estatus</th>
       <th>Pedido Profit</th>
       <th>Actualizar</th>
    </tr>

    @php
    
        $i=1;

    @endphp

    @foreach($orders as $order)

    @if($i==1)

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@update', $order->pedidos_id]]) !!}

        {!!Form::token()!!}

            <tr height="50">
             <td>{!!Form::label('codigo_venta', $order->codigo_venta)!!}</td>
             <td>{!!Form::label('seudonimo', $order->seudonimo)!!}</td>
             <td>{!!Form::label('nombre', $order->nombre)!!}</td>
             <td>{!!Form::label('titulo_publicacion', $order->titulo_publicacion)!!}</td>
             <td>{!!Form::text('codigo_profit', $order->codigo_profit)!!}</td>
             <td>{!!Form::select('cantidad', [$order->cantidad => $order->cantidad], $order->cantidad)!!}</td>
             <td>{!!Form::label('costo', $order->costo)!!}</td>
             <td>{!!Form::label('fecha', $order->fecha)!!}</td>
             <td>{!!Form::select('estatus', config('options.status'), $order->estatus)!!}</td>
             <td>{!!Form::text('pedido_profit',$order->pedido_profit)!!}</td>
             <td>{!!Form::submit('Actualizar')!!}</td>
            </tr>

        {!! Form::close() !!}



    @else

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@update', $order->pedidos_id]]) !!}

            {!!Form::token()!!}

                <tr height="50">
                 <td>{!!Form::label('codigo_venta', $order->codigo_venta)!!}</td>
                 <td>{!!Form::label('seudonimo', $order->seudonimo)!!}</td>
                 <td>{!!Form::label('nombre', $order->nombre)!!}</td>
                 <td>{!!Form::label('titulo_publicacion', $order->titulo_publicacion)!!}</td>
                 <td>{!!Form::text('codigo_profit', $order->codigo_profit)!!}</td>
                 <td>{!!Form::select('cantidad', [$order->cantidad => $order->cantidad], $order->cantidad)!!}</td>
                 <td>{!!Form::label('costo', $order->costo)!!}</td>
                 <td>{!!Form::label('fecha', $order->fecha)!!}</td>
                 <td>{!!Form::select('estatus', ['Nuevo' => 'Nuevo', 'Pendiente' => 'Pendiente', 'Duplicado' => 'Duplicado'], $order->estatus)!!}</td>
                 <td>{!!Form::text('pedido_profit',$order->pedido_profit)!!}</td>
                 <td>{!!Form::submit('Actualizar')!!}</td>
                </tr>

        {!! Form::close() !!}

    @endif

    @php
    
        $i++;

    @endphp

    @endforeach

</table>


@endsection