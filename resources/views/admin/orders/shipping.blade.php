@extends("layouts.plantilla")

@section("cabecera")

@endsection


@section("general")

<h1>Pedidos por Enviar</h1><br/><br/>

<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Envio</th>
       <th>Destinatario</th>
       <th>Seudonimo</th>
       <th>Nombre</th>
       <th>Articulo</th>
       <th>Cantidad</th>
       <th>Otros Articulos</th>
       <th>Factura Profit</th>
       <th>Imprimir Guia</th>
    </tr>
    </thead>
 
    <tbody>
    @if($orders)
        @foreach($orders as $order)
            <tr height="50">
             <td>{{$order->despacho}}</td>
             <td>{{$order->destinatario}}</td>
             <td>{{$order->seudonimo}}</td>
             <td>{{$order->nombre}}</td>
             <td>{{$order->titulo_publicacion}}</td>
             <td>{{$order->cantidad}}</td>
             @if($order->otros_articulos)
                <td>Si</td>
             @else
                <td>No</td>
             @endif
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