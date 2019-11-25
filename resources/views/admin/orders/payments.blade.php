@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Todos los Pedidos')}}
</div>

Pagos por Verificar

@endsection


@section("general")


<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Despacho</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Monto</th>
       <th>Banco</th>
       <th>Pedido Profit</th>
       <th>Ver Informacion</th>
    </tr>
    </thead>
 
    <tbody>
    @if($orders)
        @foreach($orders as $order)
            <tr height="50">
             <td>{{$order->despacho}}</td>
             <td>{{$order->seudonimo}}</td>
             <td>{{$order->nombre}}</td>
             <td>{{$order->titulo_publicacion}}</td>
             <td>{{$order->costo}}</td>
             <td>{{$order->banco}}</td>
             <td>{{$order->pedido_profit}}</td>
             <td>{{link_to_route('orders.paycheck', 'Ver Datos', $order->pedidos_id)}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>

@endsection

@section("pie")


@endsection