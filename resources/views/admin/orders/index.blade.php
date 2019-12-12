@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Administrador Pedidos ML</h1>

<table style="margin: 0 auto;">
<nav>
        {!! Form::model(Request::all(), ['action' => 'AdminOrdersController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
    <th>{!! Form::label('estatus', 'Estatus') !!}</th>
    <th>{!! Form::select('estatus', config('options.status')) !!}</th>
    <th width="7%"></th>
    <th>{!! Form::text('busqueda', null, ['class' => 'buscador', 'placeholder' => 'Busqueda']) !!}</th>
    <th>{!! Form::submit('Buscar', ['class' => 'buscador']) !!}</th>
        {!! Form::close() !!}
</nav>
</table> <br/>


<div>
<table id="tabla1">
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