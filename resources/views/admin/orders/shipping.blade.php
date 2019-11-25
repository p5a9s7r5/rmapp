@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Todos los Pedidos')}}
</div>

Pedidos por Procesar

@endsection


@section("general")


<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Nro Oferta</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Monto</th>
       <th>Cantidad</th>
       <th>Factura Profit</th>
       <th>Imprimir Guia</th>
    </tr>
    </thead>
 
    <tbody>
    @if($orders)
        @foreach($orders as $order)
            <tr height="50">
             <td>{{$order->codigo_venta}}</td>
             <td>{{$order->seudonimo}}</td>
             <td>{{$order->nombre}}</td>
             <td>{{$order->titulo_publicacion}}</td>
             <td>{{$order->costo}}</td>
             <td>{{$order->cantidad}}</td>
             <td>{{$order->factura_profit}}</td>
             <td>{{link_to_route('orders.pdfguide', 'Confirmar', $order->pedidos_id)}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>

@endsection

@section("pie")


@endsection