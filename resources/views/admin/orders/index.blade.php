@extends("layouts.plantilla")

@section("cabecera")

Administrador Pedidos ML

@endsection


@section("general")

<table width="1000" border="1">
    <tr height="50">
       <th>Nro Oferta</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Monto</th>
       <th>Actualizar</th>
    </tr>
 
    @if($orders)
        @foreach($orders as $order)
            <tr height="50">
             <td>{{$order->codigo_venta}}</td>
             <td>{{$order->seudonimo}}</td>
             <td>{{$order->nombre}}</td>
             <td>{{$order->titulo_publicacion}}</td>
             <td>{{$order->costo}}</td>
             <td>Modificar Pedido {{$order->pedido_id}}</td>
            </tr>
        @endforeach
    @endif
</table>

@endsection