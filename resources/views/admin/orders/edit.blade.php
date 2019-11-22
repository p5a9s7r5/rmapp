@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Ver Pedidos')}}
</div>

Cargar Pedidos Profit

@endsection


@section("general")

<table id="tabla1">
    <tr height="50">
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

    @foreach($orders as $order)

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@update', $order->pedidos_id]]) !!}

        {!!Form::token()!!}

            <tr height="50">
             <td>{!!Form::label('seudonimo', $order->seudonimo)!!}</td>
             <td>{!!Form::label('nombre', $order->nombre)!!}</td>
             <td>{!!Form::label('titulo_publicacion', $order->titulo_publicacion)!!}</td>
             <td>{!!Form::label('codigo_profit', $order->codigo_profit)!!}</td>
                 {!!Form::hidden('codigo_profit', $order->codigo_profit)!!}
             <td>{!!Form::label('cantidad', $order->cantidad)!!}</td>
                 {!!Form::hidden('cantidad', $order->cantidad)!!}
             <td>{!!Form::label('costo', $order->costo)!!}</td>
             <td>{!!Form::label('fecha', $order->fecha)!!}</td>
             <td>{!!Form::select('estatus', config('options.status'), $order->estatus)!!}</td>
             <td>{!!Form::text('pedido_profit',$order->pedido_profit, ['class' => 'textarea1'])!!}</td>
             <td>{!!Form::submit('Actualizar')!!}</td>
            </tr>

        {!! Form::close() !!}

    @endforeach

</table>


@endsection

@section("pie")


@endsection