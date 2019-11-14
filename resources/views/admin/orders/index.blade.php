@extends("layouts.plantilla")

@section("cabecera")

Administrador Pedidos ML

@endsection


@section("general")

<table style="margin: 0 auto;">
<nav class="navbar navbar-light bg-light">
        {!! Form::model(Request::all(), ['action' => 'AdminOrdersController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
    <th>{!! Form::label('estatus', 'Estatus') !!}</th>
    <th>{!! Form::select('estatus', config('options.status')) !!}</th>
    <th>{!! Form::text('busqueda', null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'Busqueda', 'aria-label' => 'Search']) !!}</th>
    <th>{!! Form::submit('Buscar', ['class' => 'btn btn-outline-success my-2 my-sm-0']) !!}</th>
        {!! Form::close() !!}
</nav>
</table> <br/>


<div>
<table width="1000" border="1" style="margin: 0 auto;">
    <thead>
    <tr height="50">
       <th>Id</th>
       <th>Nro Oferta</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Monto</th>
       <th>Estatus</th>
       <th>Pedido Profit</th>
       <th>Ver Datos</th>
    </tr>
    </thead>
 
    <tbody>
    @if($orders)
        @foreach($orders as $order)
            <tr height="50">
             <td>{{$order->pedidos_id}}</td>
             <td>{{$order->codigo_venta}}</td>
             <td>{{$order->seudonimo}}</td>
             <td>{{$order->nombre}}</td>
             <td>{{$order->titulo_publicacion}}</td>
             <td>{{$order->costo}}</td>
             <td>{{$order->estatus}}</td>
             <td>{{$order->pedido_profit}}</td>
             <td>{{link_to_route('orders.show', 'Ver Datos', $order->pedidos_id)}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>

@endsection

@section("pie")

{{ $orders->appends(Request::all())->render() }}

@endsection