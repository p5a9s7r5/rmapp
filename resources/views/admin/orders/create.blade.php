@extends("layouts.plantilla")

@section("cabecera")

Cargar Pedidos Profit

@endsection


@section("general")

<table border="1">
    <tr height="50">
       <th>Nro Oferta</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Variacion</th>
       <th>Monto</th>
       <th>Pedido Profit</th>
       <th>Actualizar</th>
    </tr>
 
    @if($orders)
        @foreach($orders as $order)

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@update', $order->id]]) !!}
            <tr height="50">
             <td>{{$order->codigo_venta}}</td>
             <td>{{$order->seudonimo}}</td>
             <td>{{$order->nombre}}</td>
             <td>{{$order->titulo_publicacion}}</td>
             <td>{{$order->variacion_nombre}}</td>
             <td>{{$order->costo}}</td>
             <td>{!!Form::text('pedido_profit','')!!}</td>
             <td>{!!Form::submit('Cargar')!!}</td>
            </tr>

        {!! Form::close() !!}
        @endforeach
    @endif
</table>

@endsection